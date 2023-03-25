<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJOb extends Model
{
    use HasFactory;
    protected $table = 'apply_for_job';
    protected $fillable = [
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
    ];
}
