<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Person;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function index()
    {
        

        if (!Gate::allows('create-employees')) {
            return back()->with('error', 'Access denied!');
        }

        return view('employee.registerEmployee', ['department' => Department::all()]);
    }

    public function register()
    {
        if (!Gate::allows('create-employees')) {
            return back()->with('error', 'Access denied!');
        }

        request()->validate([
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:people'],
            'sex' => ['required', 'in:male,female,F,M'],
            'DOB' => ['required'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:people'],
            'nationality' => ['required'],
            'region' => ['required'],
            'zone' => ['required'],
            'woreda' => ['required'],
            'kebele' => ['required'],
            'contact_person' => ['required', 'string'],
            'contact_person_phone' => ['required', 'numeric', 'digits:10', 'unique:people'],
            'educational_level'  => ['required', 'in:phd,msc,bsc'],
            'experience'  => ['required'],
        ]);

        $Person = Person::create([
            'first_name' => Str::ucfirst(request('first_name')),
            'middle_name' => Str::ucfirst(request('middle_name')),
            'last_name' => Str::ucfirst(request('last_name')),
            'email' => request('email'),
            'age' => Carbon::parse(request('DOB'))->age,
            'sex' => request('sex'),
            'DOB' => request('DOB'),
            'phone' => request('phone'),
            'nationality' => request('nationality'),
            'region' => request('region'),
            'zone' => request('zone'),
            'woreda' => request('woreda'),
            'kebele' => request('kebele'),
            'contact_person' => request('contact_person'),
            'contact_person_phone' => request('contact_person_phone'),
            'experience' => request('experience'),
            'educational_level' => request('educational_level')
        ]);

        if ($Person)
            return back()->with('success', 'Register successfully!');

        return back()->with('error', 'Unable to Register!');
    }



    public function details(Person $person)
    {

        return view('employee.datails', ['person' => $person]);
    }

    public function destroy(Person $person)
    {
        $success = $person->delete();
        if ($success)
            session()->flash('success', '<' . $person->first_name . '> The person has been deleted!');
        else
            session()->flash('error', '<' . $person->first_name . '> Unable delete!');
        return back();
    }

    public function trash()
    {

        $person = Person::onlyTrashed()->get();

        return view('employee.trash', ['person' => $person, 'users' => User::all()]);
    }

    public function restore($person)
    {
        $personRestore = Person::withTrashed()->find($person);
        $personRestore->restore();

        return back()->with('success', 'Restored successfully!');
    }

    public function remove($person)
    {
        $personRestore = Person::withTrashed()->find($person);
        $personRestore->forceDelete();;

        return back()->with('success', 'Removed successfully!');
    }

    public function removeAll()
    {
        if(Person::onlyTrashed()->get()->isEmpty()){
            return back()->with('error', 'Nothing to Remove!');
        }

        Person::withTrashed()->forceDelete();

        return back()->with('success', 'Removed successfully!');
    }

    public function restoreAll()
    {
        if(Person::onlyTrashed()->get()->isEmpty()){
            return back()->with('error', 'Nothing to Restore!');
        }

        Person::withTrashed()->restore();

        return back()->with('success', 'Restored successfully!');
    }
}
