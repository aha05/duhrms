<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    use HasFactory;
    protected $table = 'job_post';
    protected $fillable = [
        'title',
        'department',
        'type',
        'description',
        'start_date',
        'end_date',
    ];
}
