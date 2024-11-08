<?php

use App\Http\Controllers\Admin\Admission\AdmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Sale\SaleController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['role:admin'])->group(function () {

    Route::group(['as' => 'dashboard.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['as' => 'role.'], function () {
        Route::get('/role', [RoleController::class, 'index'])->name('index');
        Route::post('/role/store', [RoleController::class, 'store'])->name('store');
        Route::get('/role/show/{id}', [RoleController::class, 'show'])->name('show');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::patch('/role/edit/{id}/update', [RoleController::class, 'update'])->name('update');
        Route::delete('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'user.'], function () {
        Route::get('/users', [UsersController::class, 'index'])->name('index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('create');
        Route::post('/users/store', [UsersController::class, 'store'])->name('store');
        Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('show');
        Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::post('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'sale.'], function () {
        Route::get('/sale', [SaleController::class, 'index'])->name('index');
        Route::post('/sale/store', [SaleController::class, 'store'])->name('store');
        Route::get('/sale/show/{id}', [SaleController::class, 'show'])->name('show');
        Route::get('/sale/create', [SaleController::class, 'create'])->name('create');
        Route::get('/sale/edit/{id}', [SaleController::class, 'edit'])->name('edit');
        Route::patch('/sale/update/{id}', [SaleController::class, 'update'])->name('update');
        Route::delete('/sale/destroy/{id}', [SaleController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'admission.'], function () {
        Route::get('/admission', [AdmissionController::class, 'index'])->name('index');
        Route::post('/admission/store', [AdmissionController::class, 'store'])->name('store');
        Route::get('/admission/show/{id}', [AdmissionController::class, 'show'])->name('show');
        Route::get('/admission/create', [AdmissionController::class, 'create'])->name('create');
        Route::get('/admission/edit/{id}', [AdmissionController::class, 'edit'])->name('edit');
        Route::patch('/admission/update/{id}', [AdmissionController::class, 'update'])->name('update');
        Route::delete('/admission/destroy/{id}', [AdmissionController::class, 'destroy'])->name('delete');
    });
});


require __DIR__.'/auth.php';
