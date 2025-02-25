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
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

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

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::post('/friend/accept/{request}', [FriendRequestController::class, 'acceptRequest'])->name('friend.accept');
Route::post('/friend/decline/{request}', [FriendRequestController::class, 'declineRequest'])->name('friend.decline');
