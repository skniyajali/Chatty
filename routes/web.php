<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Chat\MessageController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->name('dashboard');

//Login Controller
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login');

//Logout Controller
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//Register Controller
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');
Route::delete('/register',[RegisterController::class,'destroy'])->name('register');


Route::get('/chat',[MessageController::class,'index'])->name('chat');
Route::post('/message/{id}',[MessageController::class,'getMessage'])->name('message');
Route::post('/userDetails/{id}',[MessageController::class,'getUser'])->name('userDetails');
Route::post('/messages',[MessageController::class,'sendMessage'])->name('smessage');

//Home Controller
Route::get('/',function(){
    return view('auth.login');
})->name('home');