<?php

namespace App\Models\HRMS;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\HasProfilePhoto;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto;

    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'DepartmentID',
        'FirstName',
        'LastName',
        'Email',
        'PhoneNumber',
        'DateOfBirth',
        'Gender',
        'Role',
        'JobTitle',
        'HireDate',
        'Status',
        'Address',
        'City',
        'State',
        'Country',
        'EmergencyContact',
        'ProfilePicture',
        'EmployeeNumber',
        'Password',
        'LastLogin',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function attendances()
    {
        return $this->hasMany(EmployeeAttendance::class, 'EmployeeID');
    }

    public function leaves()
    {
        return $this->hasMany(LeaveManagement::class, 'EmployeeID');
    }

    public function performanceReviews()
    {
        return $this->hasMany(PerformanceReview::class, 'EmployeeID');
    }

    public function reviewsGiven()
    {
        return $this->hasMany(PerformanceReview::class, 'ReviewerID', 'EmployeeID');
    }
}