<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //! tasks that need to happen when a class is instantiated.
    }
    public function index(User $user)
    {
        if (!Gate::allows('view-users-lists')) {
            return back()->with('error', 'Access denied!');
        }
        $users = User::all();

        return view('user.account', compact("users"));
    }

    public function destroy(User $user)
    {
        if (!Gate::allows('destroy-users')) {
            return back()->with('error', 'Access denied!');;
        }
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted!');
        return back();
    }

    public function profile(User $user)
    {

        return view('user.profile', ['user' => $user, 'roles' => Role::all(), 'department' => Department::all()]);
    }

    public function update(User $user)
    {
        if (!Gate::allows('update-users')) {
            return back()->with('error', 'Access denied!');;
        }

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['file'],
        ]);
        if (request('avatar')) {
            $str = request('avatar')->store('public/images');
            $data['avatar'] = substr($str, 14);
        }

        if (!Auth::user()->userHasRole('ACC officer') && !Auth::user()->userHasRole('Hr officer')) {
            if ($user->departments->first() != null)
                $user->departments()->update(['department_id' => request('department'), 'user_id' => $user->id]); //! change department
            else
                $user->departments()->attach(request('department')); // assign department
        }


        $user->update($data);

        return back();
    }
    public function attachRole(User $user)
    {

        $user->roles()->attach(request('role'));

        return back();
    }

    public function detachRole(User $user)
    {
        $user->roles()->detach(request('role'));

        return back();
    }
}
