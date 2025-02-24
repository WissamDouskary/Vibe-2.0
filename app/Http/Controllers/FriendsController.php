<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function sendRequest($id){
        if(auth()->user()->friends()->where('receiver_id', $id)->exists()){
            return back()->with('error', 'you have send invite to this user before!');
        }

        auth()->user()->Friends()->attach($id, ['status' => 'pending']);

        return back()->with('success', 'you have send friend request success, wait for accept it!');
    }

    public function showFriendRequests(){
        $receivedRequests = auth()->user()
        ->receivedFriendRequests()
        ->where('status', 'pending')
        ->join('users', 'friends.sender_id', '=', 'users.id') 
        ->select('friends.*', 'users.fullname as sender_name', 'users.email as sender_email', 'users.profile_photo', 'users.username', 'users.id as sender_id')
        ->get();


    return view('requestsList', compact('receivedRequests'));
    }

    public function acceptRequest($id)
    {
    $friendRequest = auth()->user()->receivedFriendRequests()->where('id', $id)->first();
    
    if ($friendRequest && $friendRequest->status === 'pending') {
        $friendRequest->update(['status' => 'accepted']);
        return back()->with('success', 'Friend request accepted.');
    }

    return back()->with('error', 'This request is not valid or already handled.');
    }

    public function refuseRequest($id)
    {
    $friendRequest = auth()->user()->receivedFriendRequests()->where('id', $id)->first();
    
    if ($friendRequest && $friendRequest->status === 'pending') {
        $friendRequest->update(['status' => 'declined']);
        return back()->with('success', 'Friend request declined.');
    }

    return back()->with('error', 'This request is not valid or already handled.');
    }
}