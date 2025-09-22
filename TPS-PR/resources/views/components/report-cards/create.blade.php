@extends('components.layouts.app')

@section('pageTitle', 'Create Report Card')

@section('pageContent')
<div class="container">
    <h2>Create Report Card</h2>

    <form action="{{ route('report-cards.store') }}" method="POST">
        @csrf

        <!-- Select Student -->
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select Term -->
        <div class="mb-3">
            <label for="term_id" class="form-label">Term</label>
            <select name="term_id" class="form-control" required>
                <option value="">-- Select Term --</option>
                @foreach($terms as $term)
                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Enter Grades -->
        <h4>Subjects & Grades</h4>
        @foreach($subjects as $subject)
            <div class="mb-3">
                <label class="form-label">{{ $subject->name }}</label>
                <input type="text" name="grades[{{ $subject->id }}]" class="form-control" placeholder="Enter grade">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save Report Card</button>
    </form>
</div>
@endsection
