@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Internship Enrollments</h1>

        <a href="{{ route('admin.internships.enrollments.create') }}" class="btn btn-primary mb-3">Create New Enrollment</a>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Internship Title</th>
                    <th>Enrollment Date</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($internshipEnrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->internship->title }}</td>
                        <td>{{ $enrollment->enrollment_date }}</td>
                        <td>{{ $enrollment->full_name }}</td>
                        <td>{{ $enrollment->email }}</td>
                        <td>{{ $enrollment->phone_number }}</td>
                        <td>{{ $enrollment->address }}</td>
                        <td>
                            <a href="{{ route('admin.internships.enrollments.show', $enrollment->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.internships.enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.internships.enrollments.destroy', $enrollment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
