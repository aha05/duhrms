<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{


    public function store()
    {
        request()->validate([
            'name' => ['required', 'string']
        ]);
        $create = Permission::create([
            'name' => request('name'),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        if ($create) {
            session()->flash('permission-created', 'Permission has been created!');
        } else{
            session()->flash('permission-failed', 'Failed to Create Permission');
        }

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission]);

    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => ['required', 'string']
        ]);

        $permission->name = request('name');
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');
        if ($permission->isDirty('name')) {
            session()->flash('permission-updated', 'Permission updated: '.$permission->name);
            $permission->save();
        } else{
            session()->flash('permission-updated', ' Nothing to update!');
        }

        return back();
    }

    public function destroy(Permission $permission)
    {

        $permission->delete();
        session()->flash('permission-deleted', '<' . $permission->name . '> Role has been deleted!');
        return back();
    }

}
