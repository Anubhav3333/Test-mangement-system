<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testcontroler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Test',[testcontroler::class, 'test']);

// login 
Route::post('/login', [testcontroler::class, 'login']);
Route::get('/login', [testcontroler::class, 'Sumitlogin']);
