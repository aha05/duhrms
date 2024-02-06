<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostJob extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'job_post';
    protected $fillable = [
        'title',
        'department',
        'type',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function applicants()
    {
        return $this->hasToMany(Applicant::class, 'job_id');
    }

}
