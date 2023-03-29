<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\PostJob;
use \App\Models\ApplyJOb;


class JobController extends Controller
{
    public function index()
    {
        $posts = PostJob::latest()->paginate(3);
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
            'age'=>'required|integer:18,150',
            'sex'=>'required|in:male,female',
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
        if($success){
            return redirect('applyjob')->with('success', 'apply successfully!');
        }
        else{
            return redirect('applyjob')->with('error', 'registration failed!');
        }
    }

    public function postjobGet()
    {
        return view('postJop');
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
            return redirect('postjob')->with('success', 'apply successfully!');
        }
        else{
            return redirect('postjob')->with('error', 'registration failed!');
        }
    }

    public function announcementGet()
    {
       return view('announcement');
    }

}
