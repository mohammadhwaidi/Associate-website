@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Enrollment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.internships.enrollments.update', $enrollment->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="internship_id">Internship:</label>
                                <select class="form-control" name="internship_id" required>
                                    @foreach($internships as $internship)
                                        <option value="{{ $internship->id }}" {{ $enrollment->internship_id === $internship->id ? 'selected' : '' }}>{{ $internship->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="enrollment_date">Enrollment Date:</label>
                                <input class="form-control" type="date" name="enrollment_date" value="{{ $enrollment->enrollment_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input class="form-control" type="text" name="full_name" value="{{ $enrollment->full_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="email" value="{{ $enrollment->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input class="form-control" type="text" name="phone_number" value="{{ $enrollment->phone_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" name="address" value="{{ $enrollment->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="education">Education:</label>
                                <textarea class="form-control" name="education" required>{{ $enrollment->education }}</textarea>
                            </div>

                            <div class="form-group" style="display: none">
                                <label for="cv">CV:</label>
                                <input type="file" class="form-control-file" name="cv">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Enrollment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
