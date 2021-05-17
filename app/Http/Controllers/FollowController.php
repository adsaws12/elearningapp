<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($id){
        $followed_user = User::find($id);
        if (!auth()->user()->followed($followed_user->id)->exists()) {
            auth()->user()->following()->attach($followed_user);
        }
        return back();
    }
    public function unfollow($id){
        $unfollowed_user = User::find($id);
        if (auth()->user()->followed($unfollowed_user->id)->exists()) {
            auth()->user()->following()->detach($unfollowed_user);
        }
        return back();
    }
    



}
