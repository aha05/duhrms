<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //! tasks that need to happen when a class is instantiated.
    }
    public function index(){
        $users = User::all();
        return view('user.account', compact("users"));
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('user-deleted','User has been deleted!');
        return back();
    }
    public function profile(User $user)
    {
        return view('user.profile', ['user'=>$user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['file'],
        ]);
        if(request('avatar')){
           $str = request('avatar')->store('public/images');
           $data['avatar'] = substr($str, 14);
         }
        $user->update($data);

        return back();
    }
}
