<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use \App\Models\PostJob;
use App\Notifications\AdminNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index()
    {

        $posts = PostJob::latest()->where('end_date', '>=', Carbon::now())->paginate(3);
        return view('applypage', compact('posts'));
    }

    public function applicants()
    {

        return view('applicant.applicants', ['applicants' => Applicant::all()]);
    }

    public function applyJobGet($id)
    {
        
        return view('applyJob', ['job' => PostJob::find($id)]);
    }

    public function applyJobPost(Request $request)
    {
        $data = $request->validate([
     
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'age' => 'required|integer|between:18,80',
            'sex' => 'required|in:Male,Female,F,M',
            'phone' => 'required|regex:/^\+\d{1,3} \d{3} \d{3} \d{3}$/',
            'level' => 'required|in:Phd.,Msc.,Bsc.',
            'GPA' => 'required|between:2,4.00|numeric',
            'attachment' => 'required|max:2048|mimes:pdf',
            'numberofdoc' =>'numeric',
            'remark' => 'required',
            'email' => 'required|email',
        ]);
        $fileName = '';
        if ($request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            global $fileName;
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
        }

        $data['attachment'] =  $fileName;
        $data['job_id'] = request('jobId');

        $jb =  PostJob::where('id', request('jobId'))->get();
        $applied = Applicant::where('job_id', request('jobId'))->where('email', request('email'))->get();
           
        if($applied->first()?? '' != "")
             return back()->with('error', 'You already applied!');

        $success = Applicant::create($data);
        if ($success ) {
            session()->flash('success', 'successfully applied!');
        } else{
            session()->flash('error', 'Failed!');
        }
        
        // $user = User::user()->userHasRole('Admin');
        // if(Auth::user()->userHasRole('Admin')==1){
        //     Notification::send($user, new AdminNotifications($request->first_name, Auth::user()->role));
        // }

        if ($success) {
            return back()->with('success', 'apply successfully!');
        } else {
            return back()->with('error', 'registration failed!');
        }
    }
}
