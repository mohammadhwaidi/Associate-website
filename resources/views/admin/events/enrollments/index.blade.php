@extends('admin.dashboard')

@section('content')
    <!-- Display all enrollments -->
    <h1>Event Enrollments</h1>

    <a href="{{ route('admin.events.enrollments.create') }}" class="btn btn-primary mb-3">Create New Enrollment</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Enrollment Date</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Actions</th>
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
                    <td>
                        <a href="{{ route('admin.events.enrollments.show', $enrollment->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.events.enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <!-- Include delete form with a button for deletion -->
                        <form action="{{ route('admin.events.enrollments.destroy', $enrollment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
