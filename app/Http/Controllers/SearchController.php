<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchCOntroller extends Controller
{
    public function search(Request $request){
        $query = $request->input('search');


        if (!$query) {
            return view('vibe.partials.user-list', ['users' => []]);
        }
    

        $users = User::where('name', 'LIKE', "%{$query}%")->get();

        return view('vibe.partials.user-list', compact('users'));
    }
}
