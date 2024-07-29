<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\SchemeController;
Use App\Http\Controllers\ProductsController;


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' =>  'api'], function(){        
        
        //-------------------------------------------Scheme Route -------------------------------------
        Route::get('schemes', [SchemeController::class, 'index'])->name('api.scheme');
        Route::get('schemes/list', [SchemeController::class, 'listSchemes'])->name('list.scheme');
        Route::post('schemes/save', [SchemeController::class, 'saveScheme'])->name('save.scheme');
        Route::get('schemes/edit/{id}', [SchemeController::class, 'editScheme'])->name('edit.scheme');
        Route::delete('schemes/delete/{id}', [SchemeController::class, 'deleteScheme'])->name('delete.scheme');
        
        //-------------------------------------------Product Route -------------------------------------
        Route::get('products', [ProductsController::class, 'index'])->name('api.product');
        Route::get('products/list', [ProductsController::class, 'listProducts'])->name('list.product');
        Route::post('products/save', [ProductsController::class, 'saveProduct'])->name('save.product');
        Route::get('products/edit/{id}', [ProductsController::class, 'editProduct'])->name('edit.product');
        Route::delete('products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('delete.product');
    });
});