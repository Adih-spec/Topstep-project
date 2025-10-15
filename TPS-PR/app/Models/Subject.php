<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class, 'class_level_stream_subject')->withPivot('stream_id');
    }

    public function streams()
    {
        return $this->belongsToMany(Stream::class, 'class_level_stream_subject')->withPivot('class_level_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}