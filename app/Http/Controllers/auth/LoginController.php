<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\LoginActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {

        return view('auth.login');
    }

    public function logInto(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->loginActivities != null) {
                $loginActivities = [
                    'user_id' => Auth::user()->id,
                    'ip_address' => $request->ip(),
                    'login_at' => Carbon::now(),
                ];

                $loginActivity = Auth::user()->loginActivities;
                $loginActivity->update($loginActivities);
            } else {
                $loginActivity = new LoginActivity([
                    'user_id' => Auth::user()->id,
                    'ip_address' => $request->ip(),
                    'login_at' => Carbon::now(),
                ]);

                $loginActivity->save();
            }

            return redirect()->intended(route('admin'));
        }

        return redirect('login')->with('error', 'login details are not match');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
