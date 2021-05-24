<?php

namespace App\Http\Controllers;

use App\User;
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
<<<<<<< Updated upstream

        return view('home', compact('users'));
    }
    
    public function users()
    {
=======
        
        return view('home', compact('users'));
    }

    public function users(){
>>>>>>> Stashed changes
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('user.users', compact('users'));
    }

<<<<<<< Updated upstream
    public function profileview($id)
    {
=======
    public function profileview($id){
>>>>>>> Stashed changes
        $userprofile = User::find($id);

        return view('user.otheruserprofile', compact('userprofile'));
    }
}
