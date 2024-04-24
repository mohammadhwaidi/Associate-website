@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Create Testimonial</h1>

        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>

            <!-- Publish Date -->
            <div class="form-group" style="display: none;">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="testimonials_image">Testimonials Image:</label>
                <input type="file" class="form-control-file" id="testimonials_image" name="testimonials_image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Testimonial</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
