<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;


class RoleController extends Controller
{

    public function temp()
    {
        return view('temp', ['permissions' => Permission::all()]);
    }

    public function index()
    {
        $user = Auth::user();

        return view('admin.roles.roles', ['permissions' => Permission::all()]);
    }

    public function  allRoles()
    {
        $user = Auth::user();
        return view('admin.roles.allroles', ['user' => $user, 'roles' => Role::all()]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'string']
        ]);
        $role = Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        $permissions = request()->input('permissions', []);
        $role->permissions()->attach($permissions);

        $user = User::all();
        foreach ($user as $s) {
            if ($s->userHasRole('Admin') == 1); {
                Notification::send($s, new AdminNotifications('[' . request('name') . '] has been created!', Auth::User()->roles()->first()->name));
                session()->flash('notification', '<' . request('name') . '> Role has been created!');
            }
        }


        return back();
    }
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-deleted', '<' . $role->name . '> Role has been deleted!');
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => ['required', 'string']
        ]);

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($role->isDirty('name')) {
            session()->flash('role-updated', ' Role updated: ' . $role->name);
            $role->save();
        } else {
            session()->flash('role-updated', ' Nothing to update!');
        }

        return back();
    }

    public function attachPermission(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detachPermission(Role $role)
    {
        $role->permissions()->detach(request('permission'));

        return back();
    }
}
