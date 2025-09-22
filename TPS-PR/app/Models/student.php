<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;
    use HasFactory, SoftDeletes;

   protected $fillable = [
    'admission_number',
    'first_name',
    'middle_name',
    'last_name',
    'email',
    'password',
    'phone',
    'dob',
    'gender',
    'country',
    'state_of_origin',
    'religion',
    'address',
    'class',
    'guardian_phone',
    'enrollment_date',
    'admission_date',
    'photo',
    'status'
];

protected $casts = [
    'dob' => 'date',
    'enrollment_date' => 'date',
    'admission_date' => 'date',
];


}
