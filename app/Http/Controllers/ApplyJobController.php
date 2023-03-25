<?php

namespace App\Http\Controllers;


use App\Models\ApplyJOb;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function index()
    {
        
        return view('applyJop');
    }
    
    public function applyJob(Request $request)
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
    }

}
