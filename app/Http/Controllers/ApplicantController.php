<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;
use App\Notifications\UserNotifications;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Gate::allows('view-applicants')) {
            return back()->with('error', 'Access denied!');
        }

        $applicants  = collect();

        foreach (Applicant::all()->sortByDesc('created_at') as $item) {
            if(Auth::user()->userHasRole('HR officer')){
                $applicants->push($item);
            } else if (Auth::user()->userHasRole('DEP officer')) {
                if ($item->hr_status == "Approved") {
                    if (((Auth::user()->departments->first() ?? '') != null) && $item->job->department != null) {
                        if (Auth::user()->departments->first()->full_name == $item->job->department) {
                           $applicants->push($item);
                        }
                    }
                }
            } else if(Auth::user()->userHasRole('Record officer')){
                if($item->hr_status == "Approved" && $item->dep_status == "Passed")
                   $applicants->push($item);
            } else if(Auth::user()->userHasRole('Admin')){
                 $applicants->push($item);
            } else{
                return back()->with('error', 'Access denied!');
            }
        }

        return view('applicant.applicants', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Applicant $applicant)
    {

        $success = false;
        if (Auth::user()->userHasRole('HR officer')) {
            if ($applicant != null) {
                $applicant->hr_status = request('hr_status');
                $success = $applicant->save();
                $users = User::all();
                foreach($users as $usr){
                    if($usr->userHasRole('DEP officer'))
                        Notification::send($usr, new UserNotifications('New Applicant has been Approved!',  $usr->roles()->first()->name, route('applicants.index')));
                }
            }
        } else if(Auth::user()->userHasRole('DEP officer')){

            if ($applicant != null && $applicant->dep_status != 'Passed') {
                $applicant->dep_status = request('dep_status');
                $success = $applicant->save();

                $users = User::all();
                foreach($users as $usr){
                    if($usr->userHasRole('Record officer'))
                        Notification::send($usr, new UserNotifications('New Applicant has been Approved!',  $usr->roles()->first()->name, route('applicants.index')));
                }


            }
        }
        if ($success)
            return back()->with('success', 'Approved Successfully!');

        return back()->with('error', 'Failed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('applicant.details', ['applicant' => Applicant::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFile($filename)
   {

       $filePath = storage_path('app/uploads/' . $filename).' ';
    //    dd($filePath);
       return response()->file($filePath);
   }

   public function download($filename)
   {
       $filePath = storage_path('app/uploads/' . $filename);

       return response()->download($filePath);
   }
}
