<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'feedback';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'phone' => 'string'
    ];
}
