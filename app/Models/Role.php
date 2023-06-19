<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permissions()
    {
       return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
       return $this->belongsToMany(User::class);
    }

    public function roleHasPermission($permission_name)
    {
        foreach ($this->permissions as $permission) {
            if (Str::lower($permission_name) == Str::lower($permission->slug))
                return true;
        }
        return false;
    }
}
