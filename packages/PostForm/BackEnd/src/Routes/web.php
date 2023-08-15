<?php

use Illuminate\Support\Facades\Route;
use PostForm\BackEnd\Http\Controllers\FormController;
use PostForm\FrontEnd\Http\Controllers\LoginController;
use PostForm\BackEnd\Http\Controllers\DashboardController;

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('front_end.dashboard.index');

    Route::get('/create', [FormController::class, 'show'])
        ->name('front_end.create.index');

    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('front_end.user.logout');

    Route::post("/create-form", [FormController::class, 'create'])
        ->name('create.form.index');
})

?>