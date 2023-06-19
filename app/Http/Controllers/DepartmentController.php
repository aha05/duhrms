<?php

namespace App\Http\Controllers;

use App\Models\Department;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {

        return view('department.department', ['department' => Department::all()]);
    }

    public function create()
    {
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
        $Success = $department->delete();

        if ($Success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }
}
