@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Enrollment</h3>
                    </div>
                    <div class="card-body">
                        {{-- Display validation errors if any --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.internships.enrollments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="internship_id">Internship:</label>
                                <select class="form-control" name="internship_id" required>
                                    <option value="" disabled selected>Select an Internship</option>
                                    @foreach($internships as $internship)
                                        <option value="{{ $internship->id }}">{{ $internship->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" style="display: none">
                                <label for="enrollment_date">Enrollment Date:</label>
                                <input class="form-control" type="date" name="enrollment_date" value="{{ old('enrollment_date', date('Y-m-d')) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input class="form-control" type="text" name="full_name" value="{{ old('full_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="education">Education:</label>
                                <textarea class="form-control" name="education" required>{{ old('education') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="cv">Upload Your CV:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cv" id="cv" required>
                                    <label class="custom-file-label" for="cv">Choose a PDF, DOC, or DOCX file (max 10MB)</label>
                                    <small class="form-text text-muted">Supported formats: PDF, DOC, DOCX. Maximum file size: 10MB.</small>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Create Enrollment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
