<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachersManagementSystem extends Model
{
    //
    protected $primaryKey = 'teachers_id';
    protected $fillable = [
        'teacher_name',
        'subject',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'hire_date',
        'qualification',
        'profile_picture',
        'status',
    ];
}
