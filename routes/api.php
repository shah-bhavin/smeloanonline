<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\SchemeController;


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' =>  'api'], function(){        
        Route::get('schemes', [SchemeController::class, 'index'])->name('api.scheme');
        Route::get('schemes/list', [SchemeController::class, 'listSchemes'])->name('list.scheme');
        Route::post('schemes/save', [SchemeController::class, 'saveScheme'])->name('save.scheme');
        Route::get('schemes/edit/{id}', [SchemeController::class, 'editScheme'])->name('edit.scheme');
        Route::delete('schemes/delete/{id}', [SchemeController::class, 'deleteScheme'])->name('delete.scheme');
    });
});