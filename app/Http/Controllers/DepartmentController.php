<?php

namespace App\Http\Controllers;

use App\Models\Department;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-departments-lists')) {
            return back()->with('error', 'Access denied!');
        }

        return view('department.department', ['department' => Department::all()]);
    }

    public function create()
    {
        if (!Gate::allows('create-departments')) {
            return back()->with('error', 'Access denied!');
        }

        request()->validate([
            'full_name' => ['required', 'string'],
            'short_name' => ['required', 'string'],
        ]);

        $Success = Department::create([
            'full_name' => Str::ucfirst(request('full_name')),
            'short_name' => Str::of(Str::upper(request('short_name'))),
        ]);

        if ($Success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function destroy(Department $department)
    {
        if (!Gate::allows('destroy-departments')) {
            return back()->with('error', 'Access denied!');
        }

        $Success = $department->delete();

        if ($Success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }
}
