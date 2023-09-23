<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::View('/', 'home')->name('home');

Route::View('/feed', 'feed')->name('feed');

Route::Get('/feed/posts/{id}', [PostController::class, 'index'])->name('post');

    

require __DIR__.'/auth.php';