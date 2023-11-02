<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController; 

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
                ->name('login');

    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/signup', [SignupController::class, 'create'])
                ->name('signup');

    Route::Post('/signup/gym', [SignupController::class, 'gymStore'])->name('gymSignup');
    Route::Post('/signup/common', [SignupController::class, 'commonStore'])->name('commonSignup');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'destroy']);
});

//deletar se n der certo//
