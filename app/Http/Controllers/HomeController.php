<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\Relationship;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '=', auth()->user()->id);
        $activities = Activity::orderBy('updated_at','DESC')->where('user_id', auth()->user()->id)
        ->with('relationship', 'relationship.followedUser', 'answer', 'answer.lesson', 'answer.lesson.category')
        ->get();
        
        $activitiesCount = Activity::where('user_id', auth()->user()->id)->where('notifiable_type', '=', 'App\Answer')->count();
        $lessonCount = Activity::where('user_id', auth()->user()->id)->where('notifiable_type', '=', 'App\Lesson')->count();


        return view('home', compact('users', 'activities', 'activitiesCount', 'lessonCount'));
    }

    public function users(){
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('user.users', compact('users'));
    }

    public function profileview($id){
        $userprofile = User::find($id);

        $activities = Activity::orderBy('updated_at','DESC')->where('user_id', $userprofile->id)
        ->with('relationship', 'relationship.followedUser', 'answer', 'answer.lesson', 'answer.lesson.category')
        ->get();

        $activitiesCount = Activity::where('user_id', $userprofile->id)->where('notifiable_type', '=', 'App\Answer')->count();
        return view('user.otheruserprofile', compact('userprofile', 'activities', 'activitiesCount'));
    }
}
