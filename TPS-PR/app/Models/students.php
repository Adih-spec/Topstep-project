<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
   use HasFactory;

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
