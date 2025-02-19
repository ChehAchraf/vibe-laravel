<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\FriendRequestController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
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


Route::get('/login',[AuthController::class , 'ShowloginForm'])->name('login.form');
Route::get('/register',[AuthController::class , 'ShowRegisterForm'])->name('register.form');
Route::get('', [HomeController::class , 'index'])->middleware(['auth','verified'])->name('home');
Route::get('/profile',[ProfileController::class, "index"])->middleware('auth','verified')->name('profile');

Route::post('/login',[AuthController::class , 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'Logout'])->name('logout');
Route::post('/register',[AuthController::class , 'register'])->name('register');

Route::match(['get','post'] , '/profile/edit', [ProfileController::class , 'ProfileEdit'])->middleware(['auth','verified'])->name('profile.edit');
