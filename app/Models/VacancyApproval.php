<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApproval extends Model
{
    use HasFactory;
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
