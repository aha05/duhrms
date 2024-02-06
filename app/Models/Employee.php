<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "employee";

    protected $fillable = [
        'person_id',
        'department_id',
        'emp_id',
        'job_title',
        'department',
        'position',
        'employment_type',
        'date_of_hire',
        'location',
        'status',
    ];

    protected $casts = [
        'date_of_hire' => 'datetime',
    ];


    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function educationalInfo()
    {
        return $this->hasMany(EducationalInfo::class, 'employee_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'employee_id');
    }

    public function bankInfo()
    {
        return $this->hasOne(BankInfo::class, 'employee_id');
    }

    public function benefit()
    {
        return $this->hasOne(Benefit::class, 'employee_id');
    }

    public function compensation()
    {
        return $this->hasOne(Compensation::class, 'employee_id');
    }

    public function contactInfo()
    {
        return $this->hasMany(ContactInfo::class, 'employee_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id');
    }

    public function leave()
    {
        return $this->hasMany(LeaveRequest::class, 'employee_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employee_department');
    }
}
