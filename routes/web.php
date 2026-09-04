<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testcontroler;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');




Route::get('/Landing', [testcontroler::class, 'Landing'])->name('Landing');




// taste here 

Route::get('/Test', [testcontroler::class, 'test'])->name('test');

Route::post('/Test', [testcontroler::class, 'testStore'])->name('testcreate');

Route::put('/Test/{id}', [testcontroler::class, 'testupdate'])->name('testupdate');
Route::delete('/Test/{id}', [testcontroler::class, 'deleteupdate'])->name('testdelete');

// login 
Route::get('/login', [testcontroler::class, 'login'])->name('login');

Route::post('/logout', [testcontroler::class, 'logout'])->name('logout');
Route::post('/login', [testcontroler::class, 'summitLogin']);

// ragistration 

Route::get('/registration', [testcontroler::class, 'registration'])->name('registration');
Route::post('/registration', [testcontroler::class, 'registrationStore'])->name('register.store');


// student  database realtion test 
Route::get('/Question/{test}', [testcontroler::class, 'question'])->name('student.Question');
// Add  Quiz 
Route::get('/Quizcreate/{test}', [testcontroler::class, 'Quizcreate'])->name('Quizcreate');
Route::post('/Quizstore', [testcontroler::class, 'store'])->name('Quizstore');
Route::get('/test/{test}/edit', [testcontroler::class, 'edit'])->name('testedit');




