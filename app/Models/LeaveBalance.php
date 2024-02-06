<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveBalance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leave_balance';

    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'balance',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function balance($id)
    {
        
    }

}
