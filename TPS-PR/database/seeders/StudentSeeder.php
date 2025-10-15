<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash; // ✅ ADD THIS LINE

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'admission_number' => 'ADM-' . rand(1000, 9999), // ✅ Provide a value
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'johndoe@example.com',
            'phone'      => '08012345678',
            'dob'        => '2010-05-12',
            'gender'     => 'Male',
            'address'    => '123 Main Street, Lagos',
            'class'      => 'Primary 4',
            'password'         => Hash::make('password123'), // ✅ Provide a hashed password
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);
}
}