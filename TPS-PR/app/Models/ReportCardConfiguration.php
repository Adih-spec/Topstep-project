<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCardConfiguration extends Model
{
    use HasFactory;

    protected $primaryKey = 'config_id'; // Because our PK is config_id
    protected $fillable = [
        'grading_scale',
        'weights',
        'show_attendance',
        'show_comments',
        'behavior_fields',
        'template_style',
        'logo_url',
        'created_by',
    ];

    protected $casts = [
        'grading_scale' => 'array',
        'weights' => 'array',
        'behavior_fields' => 'array',
        'show_attendance' => 'boolean',
        'show_comments' => 'boolean',
    ];

    // Relationship to User
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id'); 
        // Change 'user_id' to 'id' if your users table uses the default primary key
    }
}

