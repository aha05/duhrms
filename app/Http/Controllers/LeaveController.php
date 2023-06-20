<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Permission;
use Illuminate\Support\Str;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\LeaveApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LeaveController extends Controller
{

    public function index()
    {
        if (!Gate::allows('view-leave-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $leave  = collect();

        foreach (LeaveRequest::all() as $item) {
            if (Auth::user()->userHasRole('DEP officer')) {
                if (Auth::user()->departments != null && Employee::find($item->employee_id)->departments != null) {
                    if (Auth::user()->departments->first()->full_name == Employee::find($item->employee_id)->departments->first()->full_name)
                        $leave->push($item);
                }
            } else if ($item->isDepApprove($item->id) && Auth::user()->userHasRole('AC officer')) {
                if ($item->getDepApproval($item->id)->status == 'Approved') {
                    $leave->push($item);
                }
            } else if ($item->isAcApprove($item->id) && Auth::user()->userHasRole('Hr officer')) {
                if ($item->getAcApproval($item->id)->status == 'Approved') {
                    $leave->push($item);
                }
            } else {
            }
        }

        return view('leave.leaves', ['leave' => $leave]);
    }

    public function leaveHistory()
    {
        $leave  = collect();

        foreach (LeaveRequest::all()->sortByDesc('created_at') as $item) {
            if ($item->user_id == Auth::user()->id) {
                $leave->push($item);
            }
        }
        return view('leave.leaves', ['leave' => $leave]);
    }

    public function approvedLeaves()
    {
        if (!Gate::allows('view-leave-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        if (!Gate::allows('view-leave-approvals-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $leave  = collect();
        $oneCollection = collect();
        foreach (LeaveRequest::all() as $item) {
            foreach ($item->leaveApprover as $items) {
                if (Auth::user()->userHasRole('DEP officer') && $item->isDepApprove($item->id)) {
                    if ($items->approved_at == 'Department' && $items->status == 'Approved') {
                        if (Auth::user()->departments != null && Employee::find($item->employee_id)->departments != null) {
                            if (Auth::user()->departments->first()->full_name == Employee::find($item->employee_id)->departments->first()->full_name)
                                $leave->push($item);
                        }
                    }
                } else if (Auth::user()->userHasRole('AC officer') && $item->isAcApprove($item->id)) {
                    if ($items->approved_at == 'Academics') {
                        if ($items->status == 'Approved')
                            $leave->push($item);
                    }
                } else if (Auth::user()->userHasRole('HR officer') && $item->isHrApprove($item->id)) {
                    if ($items->approved_at == 'Human Resource') {
                        if ($items->status == 'Approved')
                            $leave->push($item);
                    }
                } else {
                }
            }
        }
        return view('leave.approvedLeave', ['leave' => $leave]);
    }

    public function rejectedLeaves()
    {
        if (!Gate::allows('view-leave-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        if (!Gate::allows('view-leave-approvals-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $leave  = collect();
        foreach (LeaveRequest::all() as $item) {
            foreach ($item->leaveApprover as $items) {
                if (Auth::user()->userHasRole('DEP officer') && $item->isDepApprove($item->id)) {
                    if ($items->approved_at == 'Department' && $items->status == 'Rejected') {
                        if (Auth::user()->departments != null && Employee::find($item->employee_id)->departments != null) {
                            if (Auth::user()->departments->first()->full_name == Employee::find($item->employee_id)->departments->first()->full_name)
                                $leave->push($item);
                        }
                    }
                } else if (Auth::user()->userHasRole('AC officer') && $item->isAcApprove($item->id)) {
                    if ($items->approved_at == 'Academics') {
                        if ($items->status == 'Rejected')
                            $leave->push($item);
                    }
                } else if (Auth::user()->userHasRole('HR officer') && $item->isHrApprove($item->id)) {
                    if ($items->approved_at == 'Human Resource') {
                        if ($items->status == 'Rejected')
                            $leave->push($item);
                    }
                } else {
                }
            }
        }
        return view('leave.rejectedLeave', ['leave' => $leave]);
    }

    public function pendingLeaves()
    {
        if (!Gate::allows('view-leave-requests-lists')) {
            return back()->with('error', 'Access denied!');
        }

        if (!Gate::allows('view-leave-approvals-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $leave  = collect();

        foreach (LeaveRequest::all() as $item) {
            if ($item->status == 'pending') {
                if (Auth::user()->userHasRole('DEP officer') && !$item->isDepApprove($item->id)) {
                    if (Auth::user()->departments != null && Employee::find($item->employee_id)->departments != null) {
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

        return view('leave.pendingLeave', ['leave' => $leave]);
    }

    public function createLeaveRequest()
    {
        if (!Gate::allows('create-leave-requests')) {
            return back()->with('error', 'Access denied!');
        }

        return view('leave.leaveRequest', ['leaveType' => LeaveType::all()]);
    }

    public function storeLeaveRequest()
    {
        // request()->validate([
        //     'name' => ['required', 'string'],
        //     'description' => ['required', 'string'],
        // ]);

        if (!Gate::allows('create-leave-requests')) {
            return back()->with('error', 'Access denied!');
        }

        $employee = Employee::where('emp_id', request('employeeId'))->first();
        $leaveType = LeaveType::where('name', request('leaveType'))->first();

        $success = LeaveRequest::create([
            'employee_id' => $employee->id,
            'leave_type_id' => $leaveType->id,
            'user_id' => Auth::user()->id,
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'reason' => request('reason'),
        ]);

        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function updateLeaveRequest(LeaveRequest $leave)
    {

        if (!Gate::allows('create-leave-requests')) {
            return back()->with('error', 'Access denied!');
        }

        $leave->status = request('status');
        $leave->save();

        return back();
    }

    public function leaveTypes()
    {
        if (!Gate::allows('view-leave-types-lists')) {
            return back()->with('error', 'Access denied!');
        }

        return view('leave.leaveType', ['leaveType' => LeaveType::all()]);
    }

    public function createLeaveType()
    {
        if (!Gate::allows('create-leave.types')) {
            return back()->with('error', 'Access denied!');
        }
        request()->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $success = LeaveType::create([
            'name' => Str::ucfirst(request('name')),
            'description' => request('description'),
        ]);

        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }

    public function pendingLeave($id)
    {
        if (!Gate::allows('view-leave-approvals-lists')) {
            return back()->with('error', 'Access denied!');
        }

        $leave = LeaveRequest::find($id);
        $approver = LeaveApproval::all();
        return view('leave.approval', ['leave' => $leave, 'approver' => $approver]);
    }

    public function leaveApprover(LeaveRequest $request)
    {
        if (!Gate::allows('update-leave-approvals')) {
            return back()->with('error', 'Access denied!');
        }

        $status = null;
        if (Auth::user()->userHasRole('DEP officer')) {
            if (Auth::user()->departments != null && Employee::find($request->employee_id)->departments) {
                // Check approver department head office and employee department are the same
                // dd(Employee::find($request->employee_id)->departments->first()->full_name);
                if (Auth::user()->departments->first()->full_name == Employee::find($request->employee_id)->departments->first()->full_name) {
                    global $status;
                    $status = Str::ucfirst(request('dep_status'));
                    if ($request->isDepApprove($request->id)) { //! check whether it Already Approved!
                        if ($request->getDepApproval($request->id)->status == request('dep_status')) {
                            return back()->with('error', 'You Already ' . $status . '!');
                        } else if (request('dep_status') == 'Rejected' && $request->isAcApprove($request->id)) {
                            if ($request->getAcApproval($request->id)->status == 'Approved') {
                                return back()->with('error', 'Failed!');
                            }

                            $approval = $request->getDepApproval($request->id);
                            $approval->status = request('dep_status'); //! change status
                            $approval->save();
                            return back()->with('success', 'Successfully Updated');
                        } else {
                            $approval = $request->getDepApproval($request->id);
                            $approval->status = request('dep_status'); //! change status
                            $approval->save();
                            return back()->with('success', 'Successfully Updated');
                        }
                    }
                } else {
                    return back()->with('error', 'This is not a request for your department!');
                }
            }
        } else if (Auth::user()->userHasRole('AC officer')) {
            if ($request->isDepApprove($request->id) && $request->getDepApproval($request->id)->status == 'Approved') {
                global $status;
                $status = Str::ucfirst(request('ac_status'));
                if ($request->isAcApprove($request->id)) { //! check whether it Already Approved!
                    if ($request->getAcApproval($request->id)->status == request('ac_status'))
                        return back()->with('error', 'You Already ' . $status . '!');

                    else if (request('ac_status') == 'Rejected' && $request->isHrApprove($request->id)) {
                        if ($request->getHrApproval($request->id)->status == 'Approved') {
                            return back()->with('error', 'Failed!');
                        }

                        $approval = $request->getAcApproval($request->id);
                        $approval->status = request('ac_status'); //! change status
                        $approval->save();
                        return back()->with('success', 'Successfully Updated');
                    } else {

                        $approval = $request->getAcApproval($request->id);
                        $approval->status = request('ac_status'); //! change status
                        $approval->save();
                        return back()->with('success', 'Successfully Updated');
                    }
                }
            } else {
                return back()->with('error', 'First, The Department Must Give Approval!');
            }
        } else if (Auth::user()->userHasRole('HR officer')) {  //! check if current user has Role!
            if ($request->isDepApprove($request->id) && $request->isAcApprove($request->id)) { //! check workflow sequence is satisfied!

                global $status;
                $status = Str::ucfirst(request('hr_status'));

                if ($request->isHrApprove($request->id)) { //! check whether it Already Approved!
                    if ($request->getHrApproval($request->id)->status == request('hr_status'))
                        return back()->with('error', 'You Already ' . $status . '!');
                    else if ($request->getHrApproval($request->id)->status == 'Approved')
                        return back()->with('error', 'Failed!');
                    else {
                        $approval = $request->getHrApproval($request->id);
                        $approval->status = request('hr_status'); //! change status
                        $approval->save();
                        return back()->with('success', 'Successfully Updated');
                    }
                }

                $request->status = request('hr_status'); //! here finally the request will be approved
                $request->save();
            } else {
                return back()->with('error', 'First, The Academics Should Give Approval!');
            }
        } else {
            return abort(403, 'You are not authorized!');
        }

        $approved_at = '';

        if (Auth::user()->userHasRole('DEP officer')) {
            global  $approved_at;
            $approved_at = 'Department';
        } else if (Auth::user()->userHasRole('AC officer')) {
            global  $approved_at;
            $approved_at = 'Academics';
        } else {
            global  $approved_at;
            $approved_at = 'Human Resource';
        }

        if (!Gate::allows('create-leave-approvals')) {
            return back()->with('error', 'Access denied!');
        }

        $approver = LeaveApproval::create([
            'approver_id' => Auth::user()->id,
            'leave_request_id' => request('leave_request_id'),
            'approved_at' => $approved_at,
            'status' => $status,
            'comments' => request('comment'),
        ]);

        if ($approver)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }
}
