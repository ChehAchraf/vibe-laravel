<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);

// Add the view for the login page which is going to be the index page for the user
Route::get('/login',[AuthController::class , 'ShowloginForm'])->name('login.form');
Route::post('/login',[AuthController::class , 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'Logout'])->name('logout');
Route::get('/register',[AuthController::class , 'ShowRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class , 'register'])->name('register');
Route::get('', [HomeController::class , 'index'])->middleware(['auth','verified'])->name('home');
