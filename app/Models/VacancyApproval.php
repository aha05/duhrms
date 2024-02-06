<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacancyApproval extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'vacancy_approvals';

    protected $fillable = [
        'vacancy_request_id',
        'approver_id',
        'approved_at',
        'status',
        'comments',
    ];

    public function vacancyRequest()
    {
        return $this->belongsTo(VacancyRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class);
    }


}
