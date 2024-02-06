<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'apply_for_job';
    
    protected $fillable = [
        'job_id',
        'first_name',
        'last_name',
        'age',
        'sex',
        'phone',
        'level',
        'GPA',
        'attachment',
        'numberofdoc',
        'date_of_registration',
        'remark',
        'email',
        'hr_status',
        'dep_status',
    ];

    public function job()
    {
        return $this->belongsTo(PostJob::class);
    }
}
