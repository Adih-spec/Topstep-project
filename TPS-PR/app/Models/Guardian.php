<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Guardian extends Authenticatable
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'other_names',
        'phone',
        'email',
        'religion',
        'residential_address',
        'country',
        'state_of_origin',
        'lga',
        'relationship_to_student',
        'number_of_children',
        'occupation',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
}
