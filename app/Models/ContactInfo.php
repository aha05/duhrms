<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $table = "contact_info";

    protected $fillable =[
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'phone',
        'address',
        'relationship',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'id');
    }
}
