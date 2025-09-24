<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveManagement extends Model
{
    protected $table = 'leave_management';
    protected $primaryKey = 'LeaveID';

    protected $fillable = [
        'EmployeeID',
        'LeaveType',
        'StartDate',
        'EndDate',
        'DurationDays',
        'Status',
        'Reason',
        'ApprovedBy',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'EmployeeID');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'ApprovedBy', 'EmployeeID');
    }
}
