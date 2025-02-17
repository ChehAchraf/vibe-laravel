<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use APp\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $allusers = User::all();
        return view('vibe.index',compact('user','allusers'));
    }
}
