<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\question_options;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Model;

use App\Models\users;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use GuzzleHttp\Psr7\Query;

class testcontroler extends Controller


{

  

public function Quizfixed($test)
{
    $test = Test::findOrFail($test);

    $questions = Question::with('options')
        ->where('test_id', $test->id)

        ->get();

    return view('Quizfixed', compact('test', 'questions'));
}





    public function welcome()
    {

        return view('welcome');
    }


    public function registration()
    {

        return view('registration');
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
        // dd($validated);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],

            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'] ?? 'student',
            'status'   => $validated['status'] ?? 'active',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registration successful!');
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


        $find  = test::findOrFail($id);
        $find->update($request->all());

        return redirect()->route("test");
    }


    public function deleteupdate(Request  $request, $id)
    {


        Test::destroy($id);

        return redirect()->route('test')->with('success', 'Test deleted successfully');
    }

    public function testStore(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration_minutes' => 'required',
            'total_questions' => '',
            'marks_per_question' => '',
            'negative_marks' => '',
            'status' => '',



        ]);
        Test::create($validated);
        return redirect()
            ->route('test')
            ->with('success', 'test store successful!');
    }

    public function login()
    {

        return view('login');
    }

    public function summitLogin(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.'
                ])
                ->withInput();
        }

        if ($user->role == 'ADMIN') {
            return redirect('/admin');
        } else if ($user->role == 'TEACHER') {
            return redirect('/teacher');
        } else  return redirect('/student');
    }


  public function question($test)
{
    $test = Test::findOrFail($test);

    $questions = Question::with('options')
        ->where('test_id', $test->id)
        ->get();

    return view('question', compact('test', 'questions'));
}

    public function store(Request $request)
    {

        $request->validate([
            'test_id'        => 'required|exists:tests,id',
            'question_text'  => 'required|string',
            'options'        => 'required|array|size:3',
            'correct_option' => 'required|string|between:0,2',
        ]);

        $question = Question::create([
            'test_id'         => $request->test_id,
            'question_text'   => $request->question_text,
            'question_number' => $request->question_number,
        ]);


        foreach ($request->options as $question_index => $option) {
            question_options::create([
                'question_id'  => $question->id,
                'option_label' => chr(65 + $question_index),
                'option_text'  => $option,
                'is_correct'   => $request->correct_option == $question_index ? 1 : 0,
            ]);
        }
// dd($request->all());

       return redirect()->route('Question', ['test' => $request->test_id]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
