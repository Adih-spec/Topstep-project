<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StudentSeeder::class);
        
        // Call your RolePermissionSeeder
        $this->call([
            RolePermissionSeeder::class,
        ]);
    }
}
