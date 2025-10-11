<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'section'];

    public function streams()
    {
        return $this->belongsToMany(Stream::class, 'class_level_stream');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_level_stream_subject')->withPivot('stream_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}