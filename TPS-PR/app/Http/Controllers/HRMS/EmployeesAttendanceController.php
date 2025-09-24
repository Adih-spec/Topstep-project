<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $attendances = EmployeeAttendance::with('employee')->latest()->paginate(20);
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'EmployeeID' => 'required|exists:employees,EmployeeID',
            'AttendanceDate' => 'required|date',
            'Status' => 'required',
        ]);

        // Auto-calculate work duration if CheckIn and CheckOut are given
        $workDuration = null;
        if ($request->CheckIn && $request->CheckOut) {
            $checkIn = strtotime($request->CheckIn);
            $checkOut = strtotime($request->CheckOut);
            $workDuration = round(($checkOut - $checkIn) / 3600, 2); // in hours
        }

        EmployeeAttendance::create([
            'EmployeeID' => $request->EmployeeID,
            'AttendanceDate' => $request->AttendanceDate,
            'CheckIn' => $request->CheckIn,
            'CheckOut' => $request->CheckOut,
            'WorkDurationHours' => $workDuration,
            'Status' => $request->Status,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }
}
