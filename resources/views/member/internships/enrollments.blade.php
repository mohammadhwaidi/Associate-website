@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Enrollments for {{ $internship->title }}</h1>

        <!-- Display enrollments -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Internship Title</th>
                    <th>Enrollment Date</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Education</th>
                    <th>CV</th>
                </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->internship->title }}</td>
                        <td>{{ $enrollment->enrollment_date }}</td>
                        <td>{{ $enrollment->full_name }}</td>
                        <td>{{ $enrollment->email }}</td>
                        <td>{{ $enrollment->phone_number }}</td>
                        <td>{{ $enrollment->address }}</td>
                        <td>{{ $enrollment->education }}</td>
                        <td>
                            @if ($enrollment->cv)
                                <p><a href="{{ asset($enrollment->cv) }}" target="_blank">View CV</a></p>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('member.internships.index') }}" class="btn btn-secondary mt-3">Back to Internships</a>
    </div>
@endsection
