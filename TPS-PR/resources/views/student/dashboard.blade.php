<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Student Dashboard</h1>

    <h2>Notifications</h2>
    <ul>
        @foreach ($notifications as $notification)
            <li>{{ $notification->message }} ({{ $notification->created_at->diffForHumans() }})</li>
        @endforeach
    </ul>

    <h2>Your Classes</h2>
    @foreach ($classDivisions as $division)
        <h3>{{ $division->class->name }} - {{ $division->name }}</h3>
        <h4>Courses</h4>
        <ul>
            @foreach ($division->courses as $course)
                <li>{{ $course->name }} (Teacher: {{ $course->pivot->teacher->name }})</li>
            @endforeach
        </ul>
        <h4>Syllabus for Week {{ $week }}</h4>
        <ul>
            @foreach ($division->syllabi->where('term_id', $term->id)->where('week_number', $week) as $syllabus)
                <li>{{ $syllabus->course->name }}: {{ $syllabus->topic }}</li>
            @endforeach
        </ul>
        <h4>Tasks for Week {{ $week }}</h4>
        <ul>
            @foreach ($division->tasks->where('term_id', $term->id)->where('week_number', $week) as $task)
                <li>{{ $task->title }} (Due: {{ $task->due_date }})</li>
            @endforeach
        </ul>
        <h4>Materials for Week {{ $week }}</h4>
        <ul>
            @foreach ($division->materials->where('term_id', $term->id)->where('week_number', $week) as $material)
                <li><a href="{{ Storage::url($material->file_path) }}">{{ $material->title }}</a></li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
