<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::View('/', 'home')->name('home');

Route::View('/feed', 'feed')->name('feed');

Route::Get('/feed/posts/{id}', [PostController::class, 'index'])->name('post');

Route::Get('/perfil/{id}', [ProfileController::class, 'index'])->name('perfil');

Route::get('/perfil', function(){
    return view('perfilUser');
})->name('perfilUser');

Route::get('/academia', function(){
    return view('perfilGym');
})->name('perfilGym');

Route::get('/avaliações', function(){
    return view('avaliacoesGym');
})->name('avaliacoesGym');

Route::get('/gerandoAvaliação', function(){
    return view('comentario');
})->name('comentario');

Route::get('/workoutlog', function(){
    return view('workout_log');
})->name('workoutlog');

require __DIR__.'/auth.php';
