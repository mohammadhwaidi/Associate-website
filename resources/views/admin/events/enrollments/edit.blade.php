@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Enrollment</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.events.enrollments.update', $enrollment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="event_id" class="form-label">Event ID:</label>
                        <input type="number" class="form-control" name="event_id" value="{{ $enrollment->event_id }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="enrollment_date" class="form-label">Enrollment Date:</label>
                        <input type="date" class="form-control" name="enrollment_date" value="{{ $enrollment->enrollment_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="full_name" value="{{ $enrollment->full_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $enrollment->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ $enrollment->phone_number }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{ $enrollment->address }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Enrollment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
