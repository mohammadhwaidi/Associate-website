@extends('admin.dashboard')

@section('content')
    <div class="container">
        <!-- Display single enrollment details -->
        <h1>Enrollment Details</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $enrollment->id }}</li>
            <li class="list-group-item"><strong>Event ID:</strong> {{ $enrollment->event_id }}</li>
            <li class="list-group-item"><strong>Enrollment Date:</strong> {{ $enrollment->enrollment_date }}</li>
            <li class="list-group-item"><strong>Full Name:</strong> {{ $enrollment->full_name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $enrollment->email }}</li>
            <li class="list-group-item"><strong>Phone Number:</strong> {{ $enrollment->phone_number }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $enrollment->address }}</li>
        </ul>

        <!-- Link back to enrollment list -->
        <a href="{{ route('admin.events.enrollments.index') }}" class="btn btn-primary mt-3">Back to Enrollments</a>
    </div>
@endsection
