<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\FriendRequest;
use App\Models\FriendList;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userid = Auth::id();
        
        $pending_requests = FriendRequest::where('receiver_id', $userid)
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        $friend_list = FriendRequest::where(function($query) use ($userid) {
                $query->where('sender_id', $userid)
                      ->orWhere('receiver_id', $userid);
            })
            ->where('status', 'accepted')
            ->get();

        return view('vibe.profile', compact('user', 'pending_requests', 'friend_list'));
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
    
        // المستخدم المصادق
        $authUser = auth()->id();
    
        // تحقق واش الطلب مرسل
        $CheckIfRequestSent = FriendRequest::where('sender_id', $authUser)
            ->where('receiver_id', $id)
            ->where('status', 'pending')
            ->exists();
    
        // تحقق واش الطلب مقبول
        $CheckIfRequestaccepted = FriendRequest::where('sender_id', $authUser)
            ->where('receiver_id', $id)
            ->first(); // ممكن يكون `null`
    
        return view('vibe.otherprofile', compact('user', 'CheckIfRequestSent', 'CheckIfRequestaccepted'));
    }
}
