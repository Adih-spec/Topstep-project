<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
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
        'role',
        'permissions',
        'status',
        'last_login_at',
        'last_login_ip',
        'user_agent',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays & JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'permissions' => 'array', // stored as JSON
        'status' => 'boolean',
    ];

    /**
     * Get the full name of the admin.
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->other_name} {$this->last_name}");
    }
}
