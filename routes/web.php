<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\ApplicationController;
Use App\Http\Controllers\SchemeController;

Route::view('/', 'default');


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('show.login');
        Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate.login'); 
        Route::get('register', [AuthController::class, 'showRegisterForm'])->name('authenticate.register');
        Route::post('register', [AuthController::class, 'saveRegisterForm'])->name('save.register');
    });
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('profile', [AuthController::class, 'showProfile'])->name('show.profile');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('updateprofile', [AuthController::class, 'updateprofile'])->name('update.register');
        
        //-------------------------------------------Applications Route -------------------------------------
        Route::get('applications', [ApplicationController::class, 'listApplications'])->name('list.application');
        Route::get('applications/add', [ApplicationController::class, 'addApplication'])->name('add.application');
        Route::post('applications/save', [ApplicationController::class, 'saveApplication'])->name('save.application');
        Route::get('applications/edit/{id}', [ApplicationController::class, 'editApplication'])->name('edit.application');
        Route::delete('applications', [ApplicationController::class, 'deleteApplication'])->name('delete.application');

        //-------------------------------------------Scheme Route -------------------------------------
        Route::get('schemes', [SchemeController::class, 'index'])->name('index.scheme');
    });
});
