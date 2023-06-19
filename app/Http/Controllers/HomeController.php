<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function feedback()
    {
        return view('contactus');
    }

    public function feedbackPost()
    {
        request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'message' => ['required'],
        ]);
        $hello = Feedback::create([
            'name' => Str::ucfirst(request('name')),
            'email' => request('email'),
            'phone' => request('phone'),
            'message' => request('message'),
        ]);

        $user = User::all();
        foreach ($user as $s) {
            if ($s->userHasRole('Admin') == 1)
             {
                Notification::send($s, new AdminNotifications('New Feedback!', $s->roles()->first()->name));
                session()->flash('notification', 'New Feedback!');
            }
        }
        if ($hello)
            return redirect('/contact')->with('success', 'succeeded!');

        return redirect('/contact')->with('error', 'invalid input!');

    }
}
