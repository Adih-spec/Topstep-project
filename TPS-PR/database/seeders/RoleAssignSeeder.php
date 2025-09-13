<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleAssignSeeder extends Seeder
{
    public function run(): void
    {
        // Example: Assign admin role to first user
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }

        // Example: Assign teacher role to user ID 2
        $teacher = User::find(2);
        if ($teacher) {
            $teacher->assignRole('teacher');
        }

        // Example: Assign student role to user ID 3
        $student = User::find(3);
        if ($student) {
            $student->assignRole('student');
        }
    }
}
