<?php

namespace App\Http\Controllers;

use App\Models\User;
use \App\Models\PostJob;
use \App\Models\ApplyJOb;
use App\Notifications\AdminNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index()
    {
        // $posts = PostJob::where('end_date', '>=', Carbon::now())
        //     ->orderBy('created_at', 'desc')
        //    ->get();

        $posts = PostJob::latest()->where('end_date', '>=', Carbon::now())->paginate(3);
        return view('applypage', compact('posts'));
    }

    public function applyJobGet()
    {

        return view('applyJob');
    }

    public function applyJobPost(Request $request)
    {
         $request->validate([
            'first_name' => 'required|alpha',
            'last_name'=>'required|alpha',
            'age'=>'required|integer|between:18,150',
            'sex'=>'required|in:male,female,F,M',
            'phone'=>'required|numeric|digits:10|unique:apply_for_job',
            'level'=>'required|in:phd,msc,bsc',
            'GPA'=>'required|between:2,4.00',
            'attachment'=>'required',
            'remark' => 'required',
            'email' => 'required|email|unique:apply_for_job',
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['age'] = $request->age;
        $data['sex'] = $request->sex;
        $data['phone'] = $request->phone;
        $data['level'] = $request->level;
        $data['GPA'] = $request->GPA;
        $data['attachment'] = $request->attachment;
        $data['numberofdoc'] = $request->numberofdoc;
        $data['remark'] = $request->remark;
        $data['email'] = $request->email;
        $success = ApplyJOb::create($data);

        // $user = User::user()->userHasRole('Admin');
        // if(Auth::user()->userHasRole('Admin')==1){
        //     Notification::send($user, new AdminNotifications($request->first_name, Auth::user()->role));
        // }

        if($success){
            return redirect('applyjob')->with('success', 'apply successfully!');
        }
        else{
            return redirect('applyjob')->with('error', 'registration failed!');
        }
    }


    public function postjobPost(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'department'=>'required',
        //     'type'=>'required',
        //     'description'=>'required',
        //     'start_date'=>'required|date',
        //     'end_date'=>'required|date',
        // ]);

        $data['title'] = $request->title;
        $data['department'] = $request->department;
        $data['type'] = $request->type;
        $data['description'] = $request->description;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $success = PostJob::create($data);
        if($success){
            return back()->with('success', 'succeeded!');
        }
        else{
            return back()->with('error', 'failed!');
        }
    }

}
