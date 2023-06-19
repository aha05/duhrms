<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApproval extends Model
{
    use HasFactory;
    protected $table = 'leave_approvals';

    protected $fillable = [
        'approver_id',
        'leave_request_id',
        'approved_at',
        'status',
        'comments',
    ];

    public function leaveRequest()
    {
        return $this->belongsTo(LeaveRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class);
    }

}
