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

    Route::post('/signup', [SignupController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy']);
});

//deletar se n der certo//
