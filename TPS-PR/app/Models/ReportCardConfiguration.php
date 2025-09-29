<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCardConfiguration extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_config_id';

    protected $fillable = [
        'title',
        'description',
        'student_info_fields',
        'grading_scale',
        'weights',
        'cognitive_domain',
        'affective_domain',
        'psycomotor_domain',
        'behavior_fields',
        'logo_url',
        'stamp_url',
        'signature_url',
        'template_style',
        'guard',
        'created_by',
    ];

    protected $casts = [
        'student_info_fields' => 'array',
        'grading_scale' => 'array',
        'weights' => 'array',
        'cognitive_domain' => 'array',
        'affective_domain' => 'array',
        'psycomotor_domain' => 'array',
        'behavior_fields' => 'array',
    ];
}
            