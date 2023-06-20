<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $table = "leave_requests";
    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'user_id',
        'start_date',
        'end_date',
        'reason',
        'status',
        'reviewed_by',
        'review_comments',

    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function leaveApprover()
    {
        return $this->hasMany(LeaveApproval::class, 'leave_request_id');
    }

    public function hasApprover($id)
    {

        foreach ($this->leaveApprover as $approver) {
            if ($approver->leave_request_id == $id)
                return true;
        }
        return false;
    }

    public function isDepApprove($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('DEP officer'))
                    return true;
            }
        }
        return false;
    }

    public function isAcApprove($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('AC officer'))
                    return true;
            }
        }
        return false;
    }

    public function isHrApprove($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('HR officer'))
                    return true;
            }
        }
        return false;
    }


    public function getDepApproval($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('DEP officer'))
                    return $approvers;
            }
        }
        return false;
    }

    public function getAcApproval($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('AC officer'))
                    return $approvers;
            }
        }
        return false;
    }

    public function getHrApproval($id)
    {
        foreach ($this->leaveApprover as $approvers) {
            if ($approvers->leave_request_id == $id) {
                   if($approvers->approver->userHasRole('HR officer'))
                    return $approvers;
            }
        }
        return false;
    }
}
