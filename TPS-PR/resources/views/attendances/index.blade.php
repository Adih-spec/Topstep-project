@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employees Attendance Records</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">+ Record Attendance</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Hours Worked</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->FirstName }} {{ $attendance->employee->LastName }}</td>
                    <td>{{ $attendance->AttendanceDate }}</td>
                    <td>
                        <span class="badge bg-{{ $attendance->Status == 'present' ? 'success' : ($attendance->Status == 'late' ? 'warning' : 'danger') }}">
                            {{ ucfirst($attendance->Status) }}
                        </span>
                    </td>
                    <td>{{ $attendance->CheckIn ?? '-' }}</td>
                    <td>{{ $attendance->CheckOut ?? '-' }}</td>
                    <td>{{ $attendance->WorkDurationHours ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendances->links() }}
</div>
@endsection
