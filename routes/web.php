<?php

use App\Http\Controllers\Admin\Admission\AdmissionController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Sale\SaleController;
use App\Http\Controllers\Admin\User\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['role:admin'])->group(function () {

    Route::group(['as' => 'dashboard.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    });

    Route::resource('role', RoleController::class)->names([
        'index' => 'role.index',
        'store' => 'role.store',
        'show' => 'role.show',
        'edit' => 'role.edit',
        'update' => 'role.update',
        'destroy' => 'role.delete',
    ]);

    Route::resource('users', UsersController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'destroy' => 'user.delete',
    ]);

    Route::resource('sale', SaleController::class)->names([
        'index' => 'sale.index',
        'store' => 'sale.store',
        'show' => 'sale.show',
        'create' => 'sale.create',
        'edit' => 'sale.edit',
        'update' => 'sale.update',
        'destroy' => 'sale.delete',
    ]);


    Route::resource('admission', AdmissionController::class)->names([
        'index' => 'admission.index',
        'store' => 'admission.store',
        'show' => 'admission.show',
        'create' => 'admission.create',
        'edit' => 'admission.edit',
        'update' => 'admission.update',
        'destroy' => 'admission.delete',
    ]);

    Route::resource('category', CategoryController::class)->names([
        'index' => 'category.index',
        'store' => 'category.store',
        'show' => 'category.show',
        'edit' => 'category.edit',
        'update' => 'category.update',
        'destroy' => 'category.delete',
    ]);
});


require __DIR__.'/auth.php';
