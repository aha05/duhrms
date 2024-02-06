<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Notice;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempController extends Controller
{
    public function filter(Request $request)
    {
        $employee = Auth::user()->employee;
        $person = $employee->person ?? '';

        return view('temp', ['person'  => $person, 'department' => Department::all()]);
    }

    public function tempJs(Request $request)
    {

        $value = $request->input('value'); // Get the value from the request
            Auth::user()->unreadNotifications->where('id', $value)->markAsRead();

        return response()->json(['result' => $value]);

    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $notices = Notice::where('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();

        return response()->json($notices);
        // return view('resulsts', compact('notices'));
    }

    public function searchView()
    {

        return view('liveSearch');
    }
}
