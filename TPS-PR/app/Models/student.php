<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admission_number',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'country',
        'state_of_origin',
        'address',
        'class',
        'guardian_phone',
        'enrollment_date',
        'status'
    ];

    protected $casts = [
    'dob' => 'date',
    'enrollment_date' => 'date',
];

}
