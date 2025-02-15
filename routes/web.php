<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


// Add the view for the login page which is going to be the index page for the user
Route::get('',[AuthController::class , 'login'])->name('login.form');

Route::get('/register',[AuthController::class , 'ShowRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class , 'register'])->name('register');
ROute::get('/home')