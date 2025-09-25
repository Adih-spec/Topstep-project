<?php

namespace App\Models\HRMS;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
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
    ];

    protected $hidden = ['password'];


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