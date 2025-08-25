<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['edit articles', 'delete articles', 'publish articles']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['edit articles', 'publish articles']);

        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
