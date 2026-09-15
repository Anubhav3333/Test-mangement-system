<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testcontroler;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;

/*PUBLIC ROUTES*/

Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('/Landing', [testcontroler::class, 'Landing'])->name('Landing');
Route::post('/Landing', [testcontroler::class, 'contact'])->name('contact');

Route::get('/login', [testcontroler::class, 'login'])->name('login');
Route::post('/login', [testcontroler::class, 'summitLogin'])->name('login.submit');

Route::get('/registration', [testcontroler::class, 'registration'])->name('registration');
Route::post('/registration', [testcontroler::class, 'registrationStore'])->name('register.store');

Route::post('/logout', [testcontroler::class, 'logout'])->name('logout');


// STUDENT ROUTES

Route::middleware(['auth', 'CheckStudent'])->group(function () {

    // available tests
    Route::get('/Question', [testcontroler::class, 'question'])
        ->name('student.Question');

    // Quiz attempt
    Route::get('/QuizAttempt/{test}', [testcontroler::class, 'QuizAttempt'])
        ->name('QuizAttempt');

    // Quiz answers submit 
    Route::post('/Quizstore', [testcontroler::class, 'store'])
        ->name('Quizstore');

    // all  attempts 
    Route::get('/student/attempts', [StudentController::class, 'studentAttempts'])
        ->name('student.attempts');

    //specific attempt  detailed answers 
    Route::get('/student/attempts/{id}', [StudentController::class, 'studentAttemptAnswers'])
        ->name('student.attempts.answers');
});


/* TEACHER ROUTES (Protected)*/


Route::middleware(['auth', 'CheckTeacher'])->group(function () {

    // Dashboard/Home
    Route::get('/welcome', [testcontroler::class, 'welcome'])
        ->name('teacher.dashboard');

    // Test Management
    Route::get('/Test', [testcontroler::class, 'test'])
        ->name('test');

    Route::post('/Test', [testcontroler::class, 'testStore'])
        ->name('testcreate');

    Route::put('/Test/{id}', [testcontroler::class, 'testupdate'])
        ->name('testupdate');

    Route::delete('/Test/{id}', [testcontroler::class, 'deleteupdate'])
        ->name('testdelete');

    // Quiz Creation
    Route::get('/Quizcreate/{test}', [testcontroler::class, 'Quizcreate'])
        ->name('Quizcreate');

    Route::post('/Questionstore', [testcontroler::class, 'Questionstore'])
        ->name('Questionstore');

    // View Student Attempts
    Route::get('/attempts', [testcontroler::class, 'StudentAttempts'])
        ->name('attempts');


    Route::get('/attempts/{id}', [testcontroler::class, 'attemptAnswers'])
        ->name('attempts.answers');

    Route::get('/doubt', [ContactController::class, 'doubt'])->name('doubt');
});

// contact us page 
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
