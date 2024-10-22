<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/admin/users', [UserController::class, 'index']);
});

Route::middleware(['role:editor'])->group(function () {
//    Route::get('/editor/articles', [EditorController::class, 'index']);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
require __DIR__.'/auth.php';
