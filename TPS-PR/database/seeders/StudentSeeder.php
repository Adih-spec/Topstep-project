<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'john.doe@example.com',
            'phone'      => '08012345678',
            'dob'        => '2010-05-12',
            'gender'     => 'Male',
            'address'    => '123 Main Street, Lagos',
            'class'      => 'Primary 4',
        ]);

        Student::create([
            'first_name' => 'Jane',
            'last_name'  => 'Smith',
            'email'      => 'jane.smith@example.com',
            'phone'      => '08087654321',
            'dob'        => '2011-09-20',
            'gender'     => 'Female',
            'address'    => '45 Broad Road, Abuja',
            'class'      => 'Primary 5',
        ]);

        Student::create([
            'first_name' => 'Peter',
            'last_name'  => 'Johnson',
            'email'      => 'peter.johnson@example.com',
            'phone'      => '08123456789',
            'dob'        => '2012-03-15',
            'gender'     => 'Male',
            'address'    => '78 Market Street, Port Harcourt',
            'class'      => 'Primary 3',
        ]);

        Student::create([
            'first_name' => 'Mary',
            'last_name'  => 'Brown',
            'email'      => 'mary.brown@example.com',
            'phone'      => '08198765432',
            'dob'        => '2010-11-05',
            'gender'     => 'Female',
            'address'    => '12 School Lane, Ibadan',
            'class'      => 'Primary 6',
        ]);

        Student::create([
            'first_name' => 'David',
            'last_name'  => 'Wilson',
            'email'      => 'david.wilson@example.com',
            'phone'      => '08013579246',
            'dob'        => '2011-07-28',
            'gender'     => 'Male',
            'address'    => '89 Church Road, Enugu',
            'class'      => 'Primary 4',
        ]);
    }
}
