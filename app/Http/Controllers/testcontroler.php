<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Contacts;
use App\Models\question_options;
use App\Models\QuestionOption;
use App\Models\TestAttempt;
use App\Models\TestAttemptAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Middleware\Checkrole;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;

class testcontroler extends Controller

{

    public function Quizcreate($test)
    {
        $test = Test::findOrFail($test);
        $questions = Question::with('options')
            ->where('test_id', $test->id)
            ->where('test_id', $test->total_questions)
            ->get();

        // dd($test->total_questions);
        return view('teacher.Quizcreate', compact('test', 'questions',));
    }


    // qviz attempt 

    public function QuizAttempt($id)
    {
        $test = Test::findOrFail($id);

        $questions = Question::with('options')
            ->where('test_id', $test->id)
            ->get();

        return view('student.QuizAttempt', compact('test', 'questions'));
    }





    public function registration()
    {

        return view('registration');
    }


    public function Landing(Request  $request)
    {

        return view('Landing.Landing');
    }

    public function contact(Request  $request)
    {
        $FormValidate = $request->validate(
            [
                'name'    => 'required',
                'email'   => 'required',
                'phone'  => 'required',
                'subject'  => 'required',
                'message'  => 'required',

            ]
        );

        Contacts::create($FormValidate);

        return redirect()->back()
            ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }


    public function registrationStore(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'nullable|string',
            'status'   => 'nullable|string',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'] ?? 'student',
            'status'   => $validated['status'] ?? 'active',
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    public function test()
    {
        $test = test::all();
        return view('test', compact('test'));
    }

    public function testpage()
    {

        return view('test');
    }

    public function testupdate(Request $request, $id)
    {
        $find = test::findOrFail($id);

        $find->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'status' => $request->status,
        ]);

        return redirect()->route('test');
    }

    public function  findupdate(Request $request, $test_id,)
    {
        $find  = test::findOrFail($test_id);

        return redirect()->route("test");
    }


    public function deleteupdate(Request  $request, $id)
    {


        Test::destroy($id);

        return redirect()->route('test')->with('success', 'Test deleted successfully');
    }

    //  test created here 
    public function testStore(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:6000',
            'duration_minutes' => 'required|integer|min:1',
            'total_questions' => 'required|integer|min:1',
            'marks_per_question' => 'required|numeric|min:0',
            'negative_marks' => 'required|numeric|min:0',
            'status' => 'required|in:DRAFT,PUBLISHED,CLOSED',
        ]);

        $validated['teacher_id'] = auth()->id();


        $test = Test::create($validated);
        return redirect()
            ->route('test',)
            ->with('success', 'test store successful!');
    }

    public function login()
    {


        return view('login');
    }

    public function summitLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'STUDENT') {
            return redirect()->route('student.Question');
        }

        if ($user->role === 'TEACHER') {
            return redirect()->route('welcome');
        }

        return redirect('/');
    }

    public function question()
    {
        $tests = Test::all();
        return view('student.question', compact('tests'));
    }

    public function Questionstore(Request $request)
    {
        //  get id 
        $testId = $request->input('test_id');


        $request->validate([
            'test_id'    => 'required|exists:tests,id',
            'questions.*.question_text' => 'required|string|min:3',
            'questions.*.options' => 'required|array|min:3|max:5',
            'questions.*.correct_option' => 'required|string',
        ]);

        foreach ($request->questions as $questionData) {
            $lastNumber = Question::where('test_id', $testId)->max('question_number');

            $question = Question::create([
                'test_id' => $request->test_id,
                'question_text' => $questionData['question_text'],
                'question_number' => $lastNumber + 1,
            ]);
        }
        foreach ($questionData['options']  as $question_index => $option) {
            question_options::create([
                'question_id'  => $question->id,
                'option_label' => chr(65 + $question_index),
                'option_text'  => $option,
                'is_correct' => $questionData['correct_option'] == $question_index ? 1 : 0,
            ]);
        };

        // dd($request->all());

        return redirect()->route('welcome')

            ->with('success', 'was created successfully!');;
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'answers' => 'required|array',
            'answers.*' => 'required|exists:question_options,id',
        ]);

        $testId = $validated['test_id'];
        $answers = $validated['answers'];
        $studentId = auth()->id();


        if (!$studentId) {
            \Log::warning('Quiz submission rejected: no authenticated student');
            return redirect()->back()->with('error', 'You must be logged in to submit a quiz.');
        }

        try {
            // Step 1: Create the attempt record
            $attempt = TestAttempt::create([
                'test_id' => $testId,
                'student_id' => $studentId,
                'started_at' => Carbon::now(),
                'submitted_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addHours(24),
                'status' => 'SUBMITTED',
                'score' => 0,
                'correct_count' => 0,
                'wrong_count' => 0,
                'unanswered_count' => 0,
            ]);

            foreach ($answers as $questionId => $selectedOptionId) {
                TestAttemptAnswer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $questionId,
                    'selected_option_id' => $selectedOptionId,
                    'is_answered' => 1,
                    'is_correct' => null,
                    'marks_awarded' => 0,
                    'answered_at' => Carbon::now(),
                ]);
            }
            return redirect('/Question')
                ->with('success', 'Quiz answers submitted successfully!')
                ->with('attempt_id', $attempt->id);
        } catch (\Exception $e) {
            \Log::error('Quiz submission failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                ->with('error', 'Error submitting quiz: ' . $e->getMessage());
        }
    }




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
