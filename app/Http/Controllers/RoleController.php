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
use Illuminate\Support\Facades\Gate;


class RoleController extends Controller
{

    public function temp()
    {
        return view('temp', ['permissions' => Permission::all()]);
    }

    public function index() // create role
    {
        if (!Gate::allows('create-roles')) {
            return back()->with('error', 'Access denied!');
        }

        $user = Auth::user();
        return view('admin.roles.roles', ['permissions' => Permission::all()]);
    }

    public function  allRoles()
    {
        if (!Gate::allows('view-roles-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $user = Auth::user();
        return view('admin.roles.allroles', ['user' => $user, 'roles' => Role::all()]);
    }

    public function store()
    {

        if (!Gate::allows('create-roles')) {
            return back()->with('error', 'Access denied!');
        }

        request()->validate([
            'name' => ['required', 'string', 'unique:roles']
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
                Notification::send($s, new AdminNotifications('Role [' . request('name') . '] has been created!', Auth::User()->roles()->first()->name, route('roles.all')));
                session()->flash('notification', '<' . request('name') . '> Role has been created!');
            }
        }


        return back();
    }
    public function destroy(Role $role)
    {
        if (!Gate::allows('destroy-roles')) {
            return back()->with('error', 'Access denied!');
        }
        if ($role->slug == 'admin')
            return back()->with('error', 'Failed!');
        $role->delete();
        session()->flash('role-deleted', '<' . $role->name . '> Role has been deleted!');
        return back();
    }

    public function edit(Role $role)
    {
        if (!Gate::allows('update-roles')) {
            return back()->with('error', 'Access denied!');
        }

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role)
    {
        if (!Gate::allows('update-roles')) {
            return back()->with('error', 'Access denied!');
        }
        if ($role->slug == 'admin')
            return back()->with('error', 'Failed!');

        request()->validate([
            'name' => ['required', 'string']
        ]);


        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');

        $role->permissions()->detach();
        $permissions = request()->input('permissions', []);
        $role->permissions()->attach($permissions);




        if ($role->isDirty('name') || $permissions != []) {
            session()->flash('role-updated', ' Role updated: ' . $role->name);
            $role->save();
        } else {
            session()->flash('role-updated', ' Nothing to update!');
        }

        return back();
    }

    public function attachPermission(Role $role)
    {
        if (!Gate::allows('update-roles')) {
            return back()->with('error', 'Access denied!');
        }

        if ($role->slug == 'admin') {
            return back()->with('error', 'Access denied!');
        }


        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detachPermission(Role $role)
    {
        if (!Gate::allows('update-roles')) {
            return back()->with('error', 'Access denied!');
        }

        if ($role->slug == 'admin') {
            return back()->with('error', 'Access denied!');
        }

        $role->permissions()->detach(request('permission'));

        return back();
    }
}
