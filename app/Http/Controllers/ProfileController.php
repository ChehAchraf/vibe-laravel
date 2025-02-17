<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Client\Curl\User;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $User = Auth::user();
        $firendrequest = FriendRequest::where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();
        return view('vibe.profile', compact('User','firendrequest'));
    }

    public function ShowPendingRequests(){
        $requests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();
        dd($requests);
        return response()->json($requests);
    }
}
