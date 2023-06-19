<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
    use HasFactory;
    protected $table = "educational_info";

    protected $fillable =[
        'employee_id',
        'institution',
        'field',
        'level',
        'year_of_graduation',
        'GPA',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
