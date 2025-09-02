<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class students extends Authenticatable
{

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'address',
        'class',
    ];
}
