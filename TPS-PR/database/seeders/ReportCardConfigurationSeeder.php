<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportCardConfiguration;

class ReportCardConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        ReportCardConfiguration::create([
            'title' => 'Default Report Card',
            'description' => 'Standard config for Primary School',
            'student_info_fields' => ['Name', 'Class', 'Admission No', 'DOB'],
            'grading_scale' => [
                'A' => '90-100',
                'B' => '80-89',
                'C' => '70-79',
                'D' => '60-69',
                'E' => '50-59',
                'F' => '0-49',
            ],
            'weights' => ['ca' => 0.4, 'exam' => 0.6],
            'cognitive_domain' => ['Knowledge', 'Comprehension', 'Application'],
            'affective_domain' => ['Attitude', 'Teamwork', 'Discipline'],
            'psycomotor_domain' => ['Drawing', 'Games', 'Sports'],
            'behavior_fields' => ['Neatness', 'Punctuality', 'Respect'],
            'template_style' => 'modern',
            'created_by' => 1, // admin user
        ]);
    }
}
