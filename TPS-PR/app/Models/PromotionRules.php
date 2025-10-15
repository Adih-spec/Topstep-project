<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'from_class_id',
        'to_class_id',
        'from_session_id',
        'to_session_id',
        'promotion_date',
        'status',
        'remarks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function fromClass()
    {
        return $this->belongsTo(ClassModel::class, 'from_class_id'); // Assuming your Class model is named ClassModel or adjust accordingly
    }

    public function toClass()
    {
        return $this->belongsTo(ClassModel::class, 'to_class_id');
    }

    public function fromSession()
    {
        return $this->belongsTo(Session::class, 'from_session_id');
    }

    public function toSession()
    {
        return $this->belongsTo(Session::class, 'to_session_id');
    }
}