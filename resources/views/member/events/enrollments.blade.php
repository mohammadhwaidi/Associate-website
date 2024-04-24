@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Enrollments for {{ $event->title }}</h1>

        <!-- Display enrollments -->
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Enrollment Date</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->id }}</td>
                    <td>{{ $enrollment->event->title }}</td>
                    <td>{{ $enrollment->enrollment_date }}</td>
                    <td>{{ $enrollment->full_name }}</td>
                    <td>{{ $enrollment->email }}</td>
                    <td>{{ $enrollment->phone_number }}</td>
                    <td>{{ $enrollment->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('member.events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
    </div>
@endsection
