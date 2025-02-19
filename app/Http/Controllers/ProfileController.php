<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userid = Auth::id();
        $friend_list = DB::table('users')
            ->join('friend_requests as fr1', "fr1.sender_id" ,"=","users.id")
            ->join('friend_requests as fr2' , 'fr2.receiver_id' , "=" , 'users.id')
            ->where('fr2.receiver_id',$userid)
            ->first();
        return view('vibe.profile', compact('user','friend_list'));
    }

    public function ProfileEdit(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'nickname' => 'nullable|string|max:255',
                'email' => 'required|email|unique:users,email,' . Auth::id(),
                'bio' => 'nullable|string',
                'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
            ]);

            try {
                $user = Auth::user();

                if ($request->hasFile('profile_photo')) {
                    if ($user->profile_photo) {
                        Storage::disk('public')->delete($user->profile_photo);
                    }
                    $path = $request->file('profile_photo')->store('profile-photos', 'public');
                    $user->profile_photo = $path;
                }

                $user->fill([
                    'name' => $request->name,
                    'nickname' => $request->nickname,
                    'email' => $request->email,
                    'bio' => $request->bio
                ]);

                $user->save();

                return redirect()->route('profile')
                    ->with('success', 'Profile has been updated successfully ! 😎😍');
            } catch (\Exception $e) {
                return back()->with('error', 'There must be something wrong , please try again later ! 😒');
            }
        }

        $user = Auth::user();
        return view('vibe.update', compact('user'));
    }

    public function ShowOtherProfile($id){
        // get the id
        $user = User::findOrFail($id);
        dump($user);
        return view('vibe.otherprofile', compact('user'));
    }
}
