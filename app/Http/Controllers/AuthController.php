<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // here i'm showing teh register form throught the controller controller
    public function ShowRegisterFOrm(){
        return view('auth.register');
    }

    // here i'm making the register form possible with laravel
    public function register(Request $request){
        // do the validation for the registration form
        $request->validate([
            'name'          => 'required',
            'nickname'      => 'required|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6|confirmed',
            'bio'           => 'nullable',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profilePhotoPath  = null;
        if($request->hasFile('profile_photo')){
            $profilePhotoPath  = $request->file('profile_photo')->store('profile_photos','public');
        }

        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'profile_photo' => $profilePhotoPath ,
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }

    public function ShowloginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email'    => 'Please Check you\'re email again',
            'password' => 'You\'re password seems to be incorrect'
        ]);
    }

    public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('login.form')->with('success','You have logged out 😁👌');
    }
}
