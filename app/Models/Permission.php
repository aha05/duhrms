<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roles(){

        return $this->belongsToMany(Role::class);
    }

    public function users(){

        return $this->belongsToMany(User::class);
    }

    
}
