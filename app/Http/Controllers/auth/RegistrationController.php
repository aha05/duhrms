<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class RegistrationController extends Controller
{
    public function index()
    {

        return view('auth.register', ['department'=>Department::all(), 'roles'=>Role::all()]);
    }

    public function registrationPost(Request $request)
    {
        if (! Gate::allows('create-users', Auth::user()->roles)) {
            return back()->with('error', 'Access denied!');;
        }

        $request->validate([
            'employeeId' => 'required|exists:employee,emp_id',
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'department' => 'nullable'
        ]);

        $employee = Employee::where('emp_id', request('employeeId'))->first();
        $data['employee_id'] = $employee->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        $user = User::create($data);

        if(request('role'))
            $user->roles()->attach(request('role'));

        if(request('department') != null)
            $user->departments()->attach(request('department')); // assign department

        if (!$user){
            return redirect('register')->with('error', 'Registration Failed!');
        }

        return back()->with('success', 'registration successful!');
    }
}
