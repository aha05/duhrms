<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "people";

    protected $fillable =[
        'photo',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'gender',
        'DOB',
        'phone',
        'religion',
        'marital_status',
        'NO_of_children',
        'nationality',
        'region',
        'zone',
        'woreda',
        'kebele',
        'date_of_registration',
    ];

    protected $casts = [
        'DOB' => 'datetime',
        'date_of_registration' => 'datetime',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id');
    }

    public function getPhotoAttribute($value)
    {
        return asset('storage/photos/' . $value);
    }

}
