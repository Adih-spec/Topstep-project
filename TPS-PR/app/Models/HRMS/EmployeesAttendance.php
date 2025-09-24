<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
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
