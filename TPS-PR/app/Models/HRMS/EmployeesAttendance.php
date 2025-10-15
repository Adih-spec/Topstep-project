<?php

namespace App\Models\HRMS;

use Illuminate\Database\Eloquent\Model;

class EmployeesAttendance extends Model
{
    protected $table = 'employees_attendances';
    protected $primaryKey = 'AttendanceID';

    protected $fillable = [
        'EmployeeID',
        'AttendanceDate',
        'CheckIn',
        'CheckOut',
        'WorkDurationHours',
        'Status',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'EmployeeID');
    }
}
