<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('IsAdmin'); //! tasks that need to happen when a class is instantiated.
    }

    public function index()
    {
        $user = Auth::user();
        $employee = Employee::all();
        $all_users = User::all();
        return View('admin.admin', ['user'=>$user, 'employee'=>$employee, 'all_users'=>$all_users]);
    }
}
