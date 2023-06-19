<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = "experience";

    protected $fillable = [
        'employee_id',
        'company',
        'position',
        'start_date',
        'end_date',
        'description',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
