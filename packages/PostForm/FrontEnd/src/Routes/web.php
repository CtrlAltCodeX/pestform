<?php

use Illuminate\Support\Facades\Route;
use PostForm\FrontEnd\Http\Controllers\FormController;
use PostForm\FrontEnd\Http\Controllers\LoginController;
use PostForm\FrontEnd\Http\Controllers\RegisterController;
use PostForm\FrontEnd\Http\Controllers\DashboardController;

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', [LoginController::class, 'index'])
        ->name('front_end.user.index');

    Route::post('/login', [LoginController::class, 'create'])
        ->name('front_end.user.create');

    Route::get('/register', [RegisterController::class, 'index'])
        ->name('front_end.register.index');

    Route::post('/register', [RegisterController::class, 'create'])
        ->name('front_end.register.create');

    Route::get('/', function () {
        return view('front_end::section');
    })->name('front_end.home');
});
?>