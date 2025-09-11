<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Guard extends Authenticatable
{
    use HasRoles;

    protected $fillable = ['name','email','password','guard_type'];

    // Use the default guard name for Spatie
    protected $guard_name = 'web';
}
