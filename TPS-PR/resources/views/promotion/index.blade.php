@extends('layouts.app')

@section('content')
    <h1>Promote Students</h1>

    <form method="GET">
        <select name="class_id">
            <option value="">Select Class</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $classId == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
            @endforeach
        </select>
        <select name="session_id">
            <option value="">Select Session</option>
            @foreach($sessions as $session)
                <option value="{{ $session->id }}" {{ $sessionId == $session->id ? 'selected' : '' }}>{{ $session->name }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

    @if($students->count() > 0)
        <form action="{{ route('promotions.store') }}" method="POST">
            @csrf
            <input type="hidden" name="promotion_date" value="{{ now()->format('Y-m-d') }}">
            <select name="to_class_id" required>
                <option value="">Select Next Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="to_session_id" required>
                <option value="">Select Next Session</option>
                @if($nextSession)
                    <option value="{{ $nextSession->id }}" selected>{{ $nextSession->name }}</option>
                @endif
                @foreach($sessions as $session)
                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                @endforeach
            </select>

            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Current Class</th>
                        <th>Current Session</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td><input type="checkbox" name="student_ids[]" value="{{ $student->id }}"></td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->currentClass->name }}</td>
                            <td>{{ $student->currentSession->name }}</td>
                            <td><input type="text" name="remarks[{{ $student->id }}]"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Promote Selected</button>
        </form>
    @else
        <p>No students found.</p>
    @endif
@endsection