<?php

use Illuminate\Support\Facades\Route;
use PostForm\BackEnd\Http\Controllers\FormController;
use PostForm\FrontEnd\Http\Controllers\LoginController;

Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/forms', [FormController::class, 'index'])
        ->name('back_end.form.index');
        
    Route::get('/form/create', [FormController::class, 'create'])
        ->name('back_end.form.create');
        
    Route::post("/form/save", [FormController::class, 'save'])
        ->name('back_end.form.save');
    
    Route::get('/forms/{id}', [FormController::class, 'show'])
        ->name('back_end.form.show');
    
    Route::get('/forms/{id}/edit', [FormController::class, 'edit'])
        ->name('back_end.form.edit');

    Route::post('/forms/{id}/update', [FormController::class, 'update'])
        ->name('back_end.form.update');

    Route::post('/forms/{id}/delete', [FormController::class, 'delete'])
        ->name('back_end.form.delete');    
        
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('front_end.user.logout');
})

?>