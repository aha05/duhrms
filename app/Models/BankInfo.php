<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    use HasFactory;

    protected $table = "bank_info";

    protected $fillable =[
        'employee_id',
        'full_name',
        'bank_name',
        'account_number',
        'account_type',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
