<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Notice;
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
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^\+\d{1,3} \d{3} \d{3} \d{3}$/', 'min:10'],
            'message' => ['required'],
        ], ['phone.regex' => 'The :attribute must like +251 912 345 678 and min 10 digit.',]);

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
                Notification::send($s, new AdminNotifications('New Feedback!', $s->roles()->first()->name, route('admin.feedback')));
                session()->flash('notification', 'New Feedback!');
            }
        }
        if ($hello)
            return redirect('/contact')->with('success', 'Thank You, For your feedback!');

        return redirect('/contact')->with('error', 'invalid input!');

    }

    public function Notices(){

        return view('notices', ['all_notice' => Notice::latest()->paginate(2)]);
    }

   public function search(Request $request){

        $query = $request->input('query');
        $posts = PostJob::where('title', 'like', '%'.$query.'%')->paginate(3);

        return view('applyPage', compact('posts', 'query'));
   }
}
