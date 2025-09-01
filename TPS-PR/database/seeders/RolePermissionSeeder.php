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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ✅ Define some default permissions
        $permissions = [
            'view dashboard',
            'manage students',
            'manage teachers',
            'manage staff',
            'manage guardians',
            'manage courses',
            'manage results',
        ];

        // ✅ Define roles and their permissions
        $roles = [
            'admin'    => ['view dashboard', 'manage students', 'manage teachers', 'manage staff', 'manage guardians', 'manage courses', 'manage results'],
            'teacher'  => ['view dashboard', 'manage students', 'manage results'],
            'staff'    => ['view dashboard', 'manage students'],
            'student'  => ['view dashboard'],
            'guardian' => ['view dashboard'],
        ];

        // ✅ Loop roles and assign permissions per guard
        foreach ($roles as $roleName => $rolePermissions) {
            // Create role with guard
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => $roleName, // 👈 each role has its own guard
            ]);

            // Create permissions under same guard
            foreach ($rolePermissions as $perm) {
                Permission::firstOrCreate([
                    'name' => $perm,
                    'guard_name' => $roleName, // 👈 match guard with role
                ]);
            }

            // Assign permissions
            $role->syncPermissions($rolePermissions);
        }
    }
}