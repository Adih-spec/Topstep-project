<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportCardConfiguration;

class ReportCardConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        ReportCardConfiguration::create([
            'grading_scale' => ['A'=>'90-100','B'=>'80-89'],
            'weights' => ['exam'=>0.6,'test'=>0.3,'assignment'=>0.1],
            'show_attendance' => true,
            'show_comments' => true,
            'behavior_fields' => ['Neatness','Punctuality'],
            'template_style' => 'modern',
            'logo_url' => '/images/logo.png',
            'created_by' => 1, // Replace with a real user ID from your users table
        ]);
    }
}
