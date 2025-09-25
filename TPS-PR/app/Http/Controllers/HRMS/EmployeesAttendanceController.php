<?php

namespace App\Http\Controllers\HRMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HRMS\Employee;
use Illuminate\Support\Facades\Hash;

use App\Models\HRMS\EmployeesAttendance;

class EmployeesAttendanceController extends Controller
{
    // Show all attendance records
    public function index()
    {
        $attendances = EmployeesAttendance::with('employee')->latest()->paginate(10);
        return view('attendances.index', compact('attendances'));
    }

    // Show form to create new attendance
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    // Store attendance
    public function store(Request $request)
    {
        $request->validate([
            'EmployeeID' => 'required|exists:employees,EmployeeID',
            'AttendanceDate' => 'required|date',
            'CheckIn' => 'nullable|date_format:H:i',
            'CheckOut' => 'nullable|date_format:H:i|after:CheckIn',
            'Status' => 'required|in:present,absent,on_leave,late',
        ]);

        EmployeesAttendance::create($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance recorded successfully.');
    }

    // Show a single record
    public function show($id)
    {
        $attendance = EmployeesAttendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    // Edit attendance record
    public function edit($id)
    {
        $attendance = EmployeesAttendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    // Update attendance record
    public function update(Request $request, $id)
    {
        $request->validate([
            'EmployeeID' => 'required|exists:employees,EmployeeID',
            'AttendanceDate' => 'required|date',
            'CheckIn' => 'nullable|date_format:H:i',
            'CheckOut' => 'nullable|date_format:H:i|after:CheckIn',
            'Status' => 'required|in:present,absent,on_leave,late',
        ]);

        $attendance = EmployeesAttendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance updated successfully.');
    }

    // Delete attendance record
    public function destroy($id)
    {
        $attendance = EmployeesAttendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')
                         ->with('success', 'Attendance deleted successfully.');
    }
}
