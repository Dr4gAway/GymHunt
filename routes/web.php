<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::View('/', 'home')->name('home');

Route::View('/feed', 'feed')->name('feed');

Route::Get('/feed/posts/{id}', [PostController::class, 'index'])->name('post');

Route::get('/profile/{id}', App\Http\Livewire\Profile\Common\View::class)->name('profile_common');

Route::get('/gym/{id}', App\Http\Livewire\Profile\Gym\View::class)->name('profile_gym');

/* Route::get('/avaliações', function(){
    return view('avaliacoesGym');
})->name('avaliacoesGym');

Route::get('/gerandoAvaliação', function(){
    return view('comentario');
})->name('comentario'); */

Route::get('/workoutlog', App\Http\Livewire\Exercise\Workoutlog::class)->name('workoutlog');

Route::get('/explore', function() {
    return view('location.explore');
})->name('explore');

require __DIR__.'/auth.php';
