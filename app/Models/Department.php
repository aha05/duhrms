<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "department";

    protected $fillable =[
        'full_name',
        'short_name',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_department');
    }

    public function users()
    {
        return $this->belongsToMany(Employee::class, 'users_department');
    }

    public function vacancyRequests()
    {
        return $this->hasMany(VacancyRequest::class);
    }
}
