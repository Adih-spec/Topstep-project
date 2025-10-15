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

    // Automatically append full_name to model arrays and JSON
    protected $appends = ['full_name', 'initials'];

    /**
     * Accessor for full name (proper case + fallback to email)
     */
    public function getFullNameAttribute(): string
    {
        $fullName = trim("{$this->first_name} {$this->other_name} {$this->last_name}");
        $fullName = ucwords(strtolower($fullName)); // Proper case
        return $fullName ?: $this->email; // Fallback to email if empty
    }

    /**
     * Mutators for automatically formatting names when saving
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function setOtherNameAttribute($value)
    {
        $this->attributes['other_name'] = ucwords(strtolower($value));
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords(strtolower($value));
    }

    /**
     * Accessor for initials (first letters of first, other, last name)
     */
    public function getInitialsAttribute(): string
    {
        $names = [
            $this->first_name,
            $this->other_name,
            $this->last_name,
        ];

        $initials = '';
        foreach ($names as $name) {
            if (!empty($name)) {
                $initials .= strtoupper(mb_substr(trim($name), 0, 1));
            }
        }

        return $initials ?: strtoupper(mb_substr($this->email, 0, 1));
    }
}
