<?php

use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\Home;
use App\Http\Controllers\Auth;
use App\Http\Controllers\AuthController;

;
use App\Http\Controllers\Greeting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', "Welcome")->name('view.home');

// Authentication
Route::get('/login', [AuthController::class, 'displayLogin'])->name('view.login');
Route::get('/register', [AuthController::class, 'displayRegister'])->name('view.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [Home::class, 'displayHome'])->name('view.admin.home');
Route::prefix('admin')->group(function () {
    Route::resource('/books', BookController::class);
});