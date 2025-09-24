<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'marital_status',
        'avatar',
        'id_type',
        'id_number',
        'id_document',
        'status',
        'last_login_at',
        'last_login_ip',
        'user_agent',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'permissions' => 'array',
        'status' => 'boolean',
    ];

    /**
     * Accessor for full name.
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->other_name} {$this->last_name}");
    }
}
