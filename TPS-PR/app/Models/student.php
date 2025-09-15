<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Extend for login support
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'admission_number',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'class',
        'country',
        'state_of_origin',
        'religion',
        'address',
        'admission_date',
        'status',
        'photo',
        'password', // ✅ make sure password is fillable
    ];

    // ✅ Hide password when returning Student object as JSON
    protected $hidden = [
        'password',
    ];
}
