<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserManagement extends Model
{
    use Notifiable;
    protected $table = 'user_management'; // custom table name
    protected $primaryKey = 'user_id';    // custom primary key
        protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'email',
        'phone',
        'address',
        'avatar',
        'password',
        'status',
        'last_login',
    ];
    protected $casts = [
        'last_login' => 'datetime',
        'email_verified_at' => 'datetime', // optional if you later add email verification
    ];
}