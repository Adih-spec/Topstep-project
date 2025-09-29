@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record Attendance</h2>

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="EmployeeID" class="form-label">Employee</label>
            <select name="EmployeeID" id="EmployeeID" class="form-control" required>
                <option value="">-- Select Employee --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->EmployeeID }}">
                        {{ $employee->FirstName }} {{ $employee->LastName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="AttendanceDate" class="form-label">Date</label>
            <input type="date" name="AttendanceDate" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" id="Status" class="form-control" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="late">Late</option>
                <option value="on_leave">On Leave</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="CheckIn" class="form-label">Check In (if applicable)</label>
            <input type="time" name="CheckIn" class="form-control">
        </div>

        <div class="mb-3">
            <label for="CheckOut" class="form-label">Check Out (if applicable)</label>
            <input type="time" name="CheckOut" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Attendance</button>
    </form>
</div>
@endsection
