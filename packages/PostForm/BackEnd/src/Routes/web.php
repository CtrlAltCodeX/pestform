<?php

use Illuminate\Support\Facades\Route;
use PostForm\BackEnd\Http\Controllers\FormController;
use PostForm\FrontEnd\Http\Controllers\LoginController;
use PostForm\BackEnd\Http\Controllers\DashboardController;

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/forms', [FormController::class, 'index'])
        ->name('back_end.index');

    Route::get('/forms/{id}', [FormController::class, 'edit'])
        ->name('back_end.edit');

    Route::get('/create', [FormController::class, 'show'])
        ->name('back_end.create');

    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('front_end.user.logout');

    Route::post("/create-form", [FormController::class, 'create'])
        ->name('create.form.index');
})

?>