<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testcontroler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Test', [testcontroler::class, 'test'])->name('test');

Route::post('/Test', [testcontroler::class, 'testStore'])->name('test');
 


// login 
Route::get('/login', [testcontroler::class, 'login'])->name('login');

Route::post('/login', [testcontroler::class, 'summitLogin']);

// ragistration 

Route::get('/registration ', [testcontroler::class, 'registration']);
Route::post('/registration', [testcontroler::class, 'registrationStore'])->name('register.store');
