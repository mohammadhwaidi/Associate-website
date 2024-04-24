@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Internship Enrollment Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Enrollment ID: {{ $enrollment->id }}</h5>
                <p>Internship: {{ $enrollment->internship->title }}</p>
                <p>Enrollment Date: {{ $enrollment->enrollment_date }}</p>
                <p>Full Name: {{ $enrollment->full_name }}</p>
                <p>Email: {{ $enrollment->email }}</p>
                <p>Phone Number: {{ $enrollment->phone_number }}</p>
                <p>Address: {{ $enrollment->address }}</p>
                <p>Education: {{ $enrollment->education }}</p>

                @if ($enrollment->cv)
                    <p>CV: <a href="{{ asset(  $enrollment->cv) }}" >View CV</a></p>
                @endif
            </div>
        </div>

        <a href="{{ route('admin.internships.enrollments.index') }}" class="btn btn-secondary mt-3">Back to Enrollments</a>
    </div>
@endsection
