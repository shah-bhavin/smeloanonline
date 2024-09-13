<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\ApplicationController;
Use App\Http\Controllers\SchemeController;
Use App\Http\Controllers\frontend\LoanController;

Use App\Http\Controllers\ProductsController as BackProducts;
Use App\Http\Controllers\frontend\ProductsController as FrontProducts;

use App\Models\Product;


Route::get('/', [LoanController::class, 'index'])->name('homme.product');
Route::post('/loan/saveLoan',[LoanController::class, 'saveLoan'])->name('save.loan');
Route::get('/loan/{loan_type}',[LoanController::class, 'loan'])->name('show.loan');



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
        // Route::get('applications', [ApplicationController::class, 'listAdminApplications'])->name('list.application');
        // Route::get('applications/add', [ApplicationController::class, 'addAdminApplication'])->name('add.application');
        // Route::post('applications/save', [ApplicationController::class, 'saveAdminApplication'])->name('save.application');
        // Route::get('applications/edit/{id}', [ApplicationController::class, 'editAdminApplication'])->name('edit.application');
        // Route::delete('applications', [ApplicationController::class, 'deleteAdminApplication'])->name('delete.application');

        //-------------------------------------------Scheme Route -------------------------------------
        Route::get('schemes', [SchemeController::class, 'index'])->name('index.scheme');
        
        //-------------------------------------------Application Route -------------------------------------
        Route::get('application', [ApplicationController::class, 'index'])->name('index.admin.application');

        //-------------------------------------------Product Route -------------------------------------

        Route::get('products', [BackProducts::class, 'index'])->name('index.product');

    });
});
