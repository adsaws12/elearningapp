<?php

namespace App\Http\Controllers;


use App\User;
use App\Relationship;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($followed_id){
        $followed_user = User::find($followed_id);
        if (!auth()->user()->followed($followed_user->id)->exists()) {
            auth()->user()->following()->attach($followed_user);

        }
        $follow = Relationship::where('follower_id', auth()->user()->id)->where('followed_id', $followed_user->id)->first();
        
        $activity = $follow->activity()->create([
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }
    
    public function unfollow($id){
        $unfollowed_user = User::find($id);
        $follow = Relationship::where('follower_id', auth()->user()->id)->where('followed_id', $unfollowed_user->id)->first();
        
        if (auth()->user()->followed($unfollowed_user->id)->exists()) {
            
            auth()->user()->following()->detach($unfollowed_user);
        }
        $activity = $follow->activity()->delete();
        return back();
    }

    public function following($id)
    {
        $users = User::find($id);
        $following = $users->following()->get();

        return view('user.following', compact('users','following'));
    }
    
    public function followers($id)
    {
        $users = User::find($id);
        $followers = $users->followers()->get();

        return view('user.followers', compact('users','followers'));
    }



}
