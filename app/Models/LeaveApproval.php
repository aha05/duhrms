<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveApproval extends Model
{
    use HasFactory;
    use SoftDeletes;

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
