<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    use HasFactory;

    protected $table = "compensation";

    protected $fillable =[
        'employee_id',
        'salary',
        'pay_frequency',
        'overtime_rate',
        'bonus',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
