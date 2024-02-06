<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
