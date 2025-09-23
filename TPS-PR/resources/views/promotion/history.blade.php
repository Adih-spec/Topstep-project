@extends('layouts.app')

@section('content')
    <h1>Promotion History</h1>

    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>From Class</th>
                <th>To Class</th>
                <th>From Session</th>
                <th>To Session</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->student->name }}</td>
                    <td>{{ $promotion->fromClass->name }}</td>
                    <td>{{ $promotion->toClass->name }}</td>
                    <td>{{ $promotion->fromSession->name }}</td>
                    <td>{{ $promotion->toSession->name }}</td>
                    <td>{{ $promotion->promotion_date }}</td>
                    <td>{{ $promotion->status }}</td>
                    <td>{{ $promotion->remarks }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $promotions->links() }}
@endsection