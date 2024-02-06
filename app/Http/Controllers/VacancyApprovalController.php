<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VacancyRequest;
use App\Models\VacancyApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class VacancyApprovalController extends Controller
{
    public function index(VacancyRequest $vacancyRequest)
    {
        if (!Gate::allows('create-vacancy-approvals')) {
            return back()->with('error', 'Access denied!');
        }

        return view('vacancy.vacancyApprovel', ['vacancyRequest' => $vacancyRequest, 'vacancyApproval' => VacancyApproval::all()]);
    }

    public function approve(VacancyRequest $vacancyRequest)
    {
        if (!Gate::allows('update-vacancy-approvals')) {
            return back()->with('error', 'Access denied!');
        }

        $status = '';

        if (Auth::user()->userHasRole('AC officer')) {

            global $status;
            $status = Str::ucfirst(request('ac_status'));

            if ($vacancyRequest->isAcApprove($vacancyRequest->id)) { //! check whether it Already Approved!
                if ($vacancyRequest->getDepApproval($vacancyRequest->id)->status == request('ac_status')) {
                    return back()->with('error', 'You Already ' . $status . '!');
                } else if (request('ac_status') == 'Rejected' && $vacancyRequest->isHrApprove($vacancyRequest->id)) {
                    if ($vacancyRequest->getHrApproval($vacancyRequest->id)->status == 'Approved') {
                        return back()->with('error', 'Failed!');
                    }

                    $approval = $vacancyRequest->getAcApproval($vacancyRequest->id);
                    $approval->status = request('ac_status'); //! change status
                    $approval->save();
                    return back()->with('success', 'succeed!');
                } else {
                    $approval = $vacancyRequest->getAcApproval($vacancyRequest->id);
                    $approval->status = request('ac_status'); //! change status
                    $approval->save();
                    return back()->with('success', 'succeed!');
                }
            }
        } else if (Auth::user()->userHasRole('HR officer')) {  //! check if current user has Role!
            if ($vacancyRequest->isAcApprove($vacancyRequest->id)) { //! check workflow sequence is satisfied!
                if ($vacancyRequest->getAcApproval($vacancyRequest->id)->status == 'Approved') {

                    global $status;
                    $status = Str::ucfirst(request('hr_status'));

                    if ($vacancyRequest->isHrApprove($vacancyRequest->id)) { //! check whether it Already Approved!
                        if ($vacancyRequest->getHrApproval($vacancyRequest->id)->status == request('hr_status'))
                            return back()->with('error', 'You Already ' . $status . '!');
                        else if ($vacancyRequest->getHrApproval($vacancyRequest->id)->status == 'Approved')
                            return back()->with('error', 'Failed!');
                        else {
                            $approval = $vacancyRequest->getHrApproval($vacancyRequest->id);
                            $approval->status = request('hr_status'); //! change status
                            $approval->save();
                            return back()->with('success', 'Successfully Updated');
                        }
                    }
                }
                $vacancyRequest->approved = request('hr_status') == 'Approved'; //!final approval of vacancy request
                $vacancyRequest->save();
            } else {
                return back()->with('error', 'First, The Academics Should Give Approval!');
            }
        } else {
            return abort(403, 'You are not authorized!');
        }

        $approved_at = '';

        if (Auth::user()->userHasRole('AC officer')) {
            global  $approved_at;
            $approved_at = 'Academics';
        } else if (Auth::user()->userHasRole('HR officer')) {
            global  $approved_at;
            $approved_at = 'Human Resource';
        } else {
        }

        request()->validate([
            'comment' => ['required'],
        ]);
        // dd(request('comment'));

        if (!Gate::allows('create-vacancy-approvals')) {
            return back()->with('error', 'Access denied!');
        }
        $success = VacancyApproval::create([
            'approver_id' => Auth::user()->id,
            'vacancy_request_id' => $vacancyRequest->id,
            'approved_at' => $approved_at,
            'status' => $status,
            'comments' => request('comment'),
        ]);
        if ($success)
            return back()->with('success', 'Succeed!');

        return back()->with('error', 'Failed!');
    }
}
