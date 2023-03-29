<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin'); //! tasks that need to happen when a class is instantiated.
    }

    public function index(){

        return View('admin.admin');
    }
}
