<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Guard extends Model
{
    protected $fillable = ['guard_name'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
