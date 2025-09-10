<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Guard;

class Guard extends Authenticatable
{
    use HasRoles;

    // This tells Spatie which guard name to use
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'email',
        'password',
        'guard_type', // admin, teacher, staff, student, guardian
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}


$admin = Guard::create([
    'name' => 'Super Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'guard_type' => 'admin',
]);

$admin->assignRole('admin');
