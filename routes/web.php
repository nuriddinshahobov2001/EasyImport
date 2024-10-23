<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Product\AuthorsController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

    Route::group(['as' => 'product.'], function () {
        Route::get('/product', [ProductController::class, 'index'])->name('index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('create');
    });

    Route::group(['as' => 'category.'], function () {
        Route::get('/category', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('create');
    });

    Route::group(['as' => 'author.'], function () {
        Route::get('/author', [AuthorsController::class, 'index'])->name('index');
        Route::get('/author/create', [AuthorsController::class, 'create'])->name('create');
        Route::post('/author/store', [AuthorsController::class, 'store'])->name('store');
        Route::get('/author/show/{id}', [AuthorsController::class, 'show'])->name('show');
        Route::get('/author/edit/{id}', [AuthorsController::class, 'edit'])->name('edit');
        Route::delete('/author/edit/{id}', [AuthorsController::class, 'destroy'])->name('delete');
    });


});


require __DIR__.'/auth.php';
