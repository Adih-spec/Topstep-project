@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
<div class="container">
    <h2 class="mb-3">Event List</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add New Event</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Location</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->capacity }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection