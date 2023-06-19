<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

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


    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id');
    }

    public function getPhotoAttribute($value)
    {
        return asset('storage/photos/' . $value);
    }

}
