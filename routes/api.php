<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\SchemeController;
Use App\Http\Controllers\ProductsController;
Use App\Http\Controllers\ApplicationController;
Use App\Http\Controllers\frontend\LoanController;


Route::post('application/save', [ApplicationController::class, 'saveApplication'])->name('save.application');


Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' =>  'api'], function(){        
        
        //-------------------------------------------Scheme Route -------------------------------------
        // Route::get('schemes', [SchemeController::class, 'index'])->name('api.scheme');
        // Route::get('schemes/list', [SchemeController::class, 'listSchemes'])->name('admin.list.application');
        // Route::post('schemes/save', [SchemeController::class, 'saveScheme'])->name('save.scheme');
        // Route::get('schemes/edit/{id}', [SchemeController::class, 'editScheme'])->name('edit.scheme');
        // Route::delete('schemes/delete/{id}', [SchemeController::class, 'deleteScheme'])->name('delete.scheme');

        //-------------------------------------------Application Route -------------------------------------
        Route::get('application', [ApplicationController::class, 'index'])->name('api.application');
        Route::get('application/list', [LoanController::class, 'listApplication'])->name('admin.list.application');
        Route::post('application/save', [ApplicationController::class, 'saveApplication'])->name('admin.save.application');
        Route::get('application/edit/{id}', [ApplicationController::class, 'editApplication'])->name('admin.edit.application');
        Route::delete('application/delete/{id}', [ApplicationController::class, 'deleteApplication'])->name('delete.application');
        
        //-------------------------------------------Product Route -------------------------------------
        Route::get('products', [ProductsController::class, 'index'])->name('api.product');
        Route::get('products/list', [ProductsController::class, 'listProducts'])->name('list.product');
        Route::post('products/save', [ProductsController::class, 'saveProduct'])->name('save.product');
        Route::get('products/edit/{id}', [ProductsController::class, 'editProduct'])->name('edit.product');
        Route::delete('products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('delete.product');

        //-------------------------------------------Loan Route -------------------------------------
        Route::get('viewLoan', [LoanController::class, 'viewLoan'])->name('api.loan.view');
    });
});