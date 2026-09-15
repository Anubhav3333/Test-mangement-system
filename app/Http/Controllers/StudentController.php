<?php
namespace App\Http\Controllers;
use App\Models\TestAttempt;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function studentAttempts()
    {
        $attempts = TestAttempt::with('test')
            ->where('student_id', Auth::id())
            ->latest('id')
            ->get();
                        
        return view('student.attempts', compact('attempts'));
    }


    public function studentAttemptAnswers($id)
    {
   $attempt = TestAttempt::with('test')
            ->where('id', $id)
            ->where('student_id', Auth::id())
            ->firstOrFail();
        $answers = $attempt->answers()
            ->with(['question', 'selectedOption'])
            ->get();
        $totalAnswers = $answers->count();

        $correctCount = $attempt->thiscorrectAnswers()->count();


        $score = (float) $attempt->score;

        $totalMarks = $attempt->test->total_questions
            * (float) $attempt->test->marks_per_question;

        $passingPercentage = 40;

        $passingMarks = ($totalMarks * $passingPercentage) / 100;

        $scorePercentage = $totalMarks > 0
            ? round(($score / $totalMarks) * 100, 2)
            : 0;
        $result = $score >= $passingMarks
            ? 'Pass'
            : 'Fail';

        return view('student.studentAttempts', compact(
            'attempt',
            'answers',
            'totalAnswers',
            'correctCount',
            'score',
            'totalMarks',
            'passingMarks',
            'scorePercentage',
            'result'
        ));
    }
    }
