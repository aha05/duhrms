<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Notice;
use App\Models\PostJob;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Department;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\LoginActivity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('IsAdmin'); //! tasks that need to happen when a class is instantiated.
    }

    public function index()
    {

        foreach (LeaveRequest::all() as $leaveRequest) {
            if ($leaveRequest->isDepApprove($leaveRequest->id) == false) {

                $created_at = Carbon::parse($leaveRequest->created_at);
                $currentDate = Carbon::now();
                $days = $created_at->diffInDays($currentDate);
                if ($days >= 10) {
                    $leaveRequest->status = 'Expired';
                }
            } else if ($leaveRequest->isAcApprove($leaveRequest->id) == false) {
                $created_at = Carbon::parse($leaveRequest->created_at);
                $currentDate = Carbon::now();
                $days = $created_at->diffInDays($currentDate);
                if ($days >= 20) {
                    $leaveRequest->status = 'Expired';
                }
            }
            if ($leaveRequest->isHrApprove($leaveRequest->id) == false) {
                $created_at = Carbon::parse($leaveRequest->created_at);
                $currentDate = Carbon::now();
                $days = $created_at->diffInDays($currentDate);
                if ($days >= 30) {
                    $leaveRequest->status = 'Expired';
                }
            } else {
            }
        }


        $leave  = collect();

        foreach (LeaveRequest::all() as $item) {
            if ($item->status == 'pending') {
                if (Auth::user()->userHasRole('DEP officer') && !$item->isDepApprove($item->id)) {
                    if (((Auth::user()->departments->first() ?? '') != null) && ((Employee::find($item->employee_id)->departments->first() ?? '') != null)) {
                        if (Auth::user()->departments->first()->full_name == Employee::find($item->employee_id)->departments->first()->full_name)
                            $leave->push($item);
                    }
                } else if ($item->isDepApprove($item->id) && Auth::user()->userHasRole('AC officer')) {
                    if ($item->getDepApproval($item->id)->status == 'Approved' && !$item->isAcApprove($item->id)) {
                        $leave->push($item);
                    }
                } else if ($item->isAcApprove($item->id) && Auth::user()->userHasRole('Hr officer')) {
                    if ($item->getAcApproval($item->id)->status == 'Approved' && !$item->isHrApprove($item->id)) {
                        $leave->push($item);
                    }
                } else {
                }
            }
        }

        $self_leave  = collect();


        foreach (LeaveRequest::all()->sortByDesc('created_at') as $item) {
            if ($item->user_id == Auth::user()->id) {
                $self_leave->push($item);

            }
        }

        return View('admin.admin', ['user' => Auth::user(), 'employee' => Employee::all(), 'all_users' => User::all(), 'leave' => $leave, 'self_leave' => $self_leave ]);
    }

    public function feedback()
    {

        return View('admin.feedback.feedback', ['feedBks' => Feedback::all()]);
    }

    public function showFeedback($id)
    {

        return View('admin.feedback.details', ['feedback' => Feedback::find($id)]);
    }

    public function createJob()
    {

        return view('announcement.postJob', ['departments' => Department::all(),]);
    }

    public function storeJob(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'department' => 'required',
            'type' => 'required',
            'description' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $success = PostJob::create($data);
        $success->code = 'DJB00' . $success->id;
        $success->save();

        if ($success) {
            return back()->with('success', 'Succeed!');
        } else {
            return back()->with('error', 'Failed!');
        }
    }

    public function showJob($id)
    {

        return view('announcement.jobDetails', ['departments' => Department::all(), 'postedJob' => PostJob::find($id)]);
    }

    public function jobs()
    {

        return view('announcement.jobs', ['jobLists' => PostJob::all()]);
    }

    //? Announcement notice

    public function createNotice()
    {

        return view('announcement.postNotice', ['postedJob' => PostJob::find(1), 'departments' => Department::all()]);
    }

    public function storeNotice()
    {

        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;
        $success = Notice::create($data);
        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function allNotices()
    {

        return view('announcement.notice', ['all_notices' => Notice::all()]);
    }

    public function showNotice($id)
    {

        return view('announcement.noticeDetails', ['notice' => Notice::find($id)]);
    }

    public function editNotices($id)
    {

        return view('announcement.editNotice', ['notice' => Notice::find($id)]);
    }

    public function updateNotice(Notice $notice)
    {

        $data =  request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $success = $notice->update($data);
        if ($success)
            return back()->with('success', 'successfully updated!');

        return back()->with('error', 'operation failed!');
    }

    public function destroyNotice($id)
    {

        $notice = Notice::find($id);
        $success = $notice->delete();
        if ($success)
            return back()->with('success', 'successfully removed!');

        return back()->with('error', 'operation failed!');
    }


    public function loginActivity()
    {

        return view('admin.loginActivity', ['logActivity' => LoginActivity::all()]);
    }

    public function markAsRead(Request $request)
    {
        // dd('hello');
        // $id = $request->input('value');
        // auth()->user()->unreadNotifications->where('id', $id)->markAsRead();

        // return response()->json(['message' => 'Success']);

        $value = $request->input('value');

        // Process the data as needed

        // Return a response if necessary

    }

    public function deleteJob($id){
        $job = PostJob::find($id);
        $job->delete();

        return back()->with('success', 'Delete Successfully!');
    }

    public function editJob($id){
        $job = PostJob::find($id);


        return view('announcement.editJob', ['postedJob'=>$job, 'departments' => Department::all()]);
    }

    public function updateJob($id){

        $data = request()->validate([
            'title' => 'required',
            'department' => 'required',
            'type' => 'required',
            'description' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

       if($data)
        $data['code'] = 'DJB00' . request('postId');
        $job = PostJob::find($id);
        $success =  $job->update($data);

        if ($success) {
            return back()->with('success', 'Update Succeed!');
        } else {
            return back()->with('error', 'Update Failed!');
        }
    }
}
