<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $table = "benefits";

    protected $fillable =[
        'employee_id',
        'healthcare',
        'vacation',
        'retirement',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
