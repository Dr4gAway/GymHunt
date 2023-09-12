<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/feed', function() {
        return view('feed');
    });
});

Route::get('/perfil', function(){
    return view('perfilUser');
})->name('perfilUser');

Route::get('/academia', function(){
    return view('perfilGym');
})->name('perfilGym');

Route::get('/avaliações', function(){
    return view('avaliacoesGym');
})->name('avaliacoesGym');

require __DIR__.'/auth.php';
