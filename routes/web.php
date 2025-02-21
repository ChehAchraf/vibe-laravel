<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\FriendRequestController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Models\FriendRequest;
use App\Http\Controllers\SearchController;

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
Route::get('/profile/{id}', [ProfileController::class , 'ShowOtherProfile'])->where('id','[0-9]+')->name('profile.show');
Route::get('/friend/requests', [FriendRequestController::class, 'receivedRequests'])->middleware(['auth','verified'])->name('firend.request');
Route::get('/profile/search',[SearchController::class , 'search' ]);
Route::get('/search', function () {
    return view('vibe.search'); 
});
Route::post('/login',[AuthController::class , 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'Logout'])->name('logout');
Route::post('/register',[AuthController::class , 'register'])->name('register');
Route::post("/send/request/{receiver_id}", [FriendRequestController::class , 'SendRequest'])->middleware('auth')->name('send.request');

Route::match(['get','post'] , '/profile/edit', [ProfileController::class , 'ProfileEdit'])->middleware(['auth','verified'])->name('profile.edit');
