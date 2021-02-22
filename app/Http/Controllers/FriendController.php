<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FriendController extends Controller
{
    public function index(Request $request)
    {
        $friend = new Friend;
        $friend->user_id_1 = Auth::user()->id;
        $friend->user_id_2 = $request->friend_id;
        $friend->save();

        return [
            'friend_id'=> $request->friend_id
        ];
    }

    public function showFriends($id)
    {
        $user = User::find($id);
        return view("friend.show")->withUser($user);
    }

    public function remove(Request $request)
    {
        $friend = Friend::all()->where('user_id_1', '=', Auth::user()->id)->where('user_id_2', '=', $request->friend_id)->first();
        $friend->delete();

        return[
            'friend_id'=> $request->friend_id
        ];
    }
}
