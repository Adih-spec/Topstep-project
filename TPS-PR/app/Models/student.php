<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'phone',
        'dob',
        'gender',
        'class_level_id',
        'stream_id',
        'country',
        'state_of_origin',
        'religion',
        'address',
        'admission_number',
        'admission_date',
        'photo',
        'status',
    ];

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
    
}