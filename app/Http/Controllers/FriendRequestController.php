<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class FriendRequestController extends Controller
{
    public function SendRequest($receiver_id){
        $reciever = User::findOrFail($receiver_id);
        $exists = FriendRequest::where('sender_id',Auth::id())
            ->where('receiver_id',$receiver_id)
            ->where('status','pending')
            ->exists();
        if($exists){
            return back()->with('error','The Firend request is already sent 😁');
        }
        FriendRequest::create([
            'sender_id' => auth::id(),
            'receiver_id' => $receiver_id,
            'status' => 'pending'
        ]);
        return back()->with('success','Sent ! 😎😍');

    }

    public function acceptRequest($request_id)
    {
        $request = FriendRequest::where('id', $request_id)
            ->where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->update(['status' => 'accepted']);

        return back()->with('success', 'Accepted ! 😁😍');
    }

    public function declineRequest($request_id)
    {
        $request = FriendRequest::where('id', $request_id)
            ->where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->update(['status' => 'declined']);

        return back()->with('error', 'Declined ! 😒');
    }

    public function cancelRequest($request_id)
    {
        $request = FriendRequest::where('id', $request_id)
            ->where('sender_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->delete();

        return back()->with('success', 'Cancled ! 😁');
    }
    public function receivedRequests()
    {

        $requests = FriendRequest::where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();
        return view('vibe.profile', compact('requests'));
    }
}
