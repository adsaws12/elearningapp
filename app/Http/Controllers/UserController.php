<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        
        return view('admin.users.usersviewadmin', compact('users'));
    }

    public function register(){
        return view('admin.users.register');
    }

    public function create(Request $request){
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,
            'usertype' => $request->usertype,
        ]);
        
        return redirect('/admin/dashboard/users');
    }

    public function delete($id){
        User:: where('id',$id)->delete();

        return redirect('/admin/dashboard/users');
    }

    public function edit(User $user){
        return view('admin.users.edituser', compact('user'));
    }
    
    public function update(User $user, Request $request){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,
            'usertype' => $request->usertype,
        ]);
        return redirect('/admin/dashboard/users');
    }

    public function edituser(User $user){
        return view('admin.users.editcurrentuser', compact('user'));  
    }
    //current user
    public function updateuser(User $user, Request $request){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password_confirmation,
            'usertype' => $request->usertype,
        ]);
        return redirect('/admin/dashboard/profile');
    }
}
