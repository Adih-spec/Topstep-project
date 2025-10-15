<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class, 'class_level_stream');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_level_stream_subject')->withPivot('class_level_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}