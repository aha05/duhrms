<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'title',
        'description',
        'number_of_positions',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
