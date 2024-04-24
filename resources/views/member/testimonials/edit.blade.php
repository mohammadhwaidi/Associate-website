@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Edit Testimonial</h1>

        <form method="POST" action="{{ route('member.testimonials.update', ['id' => $testimonial->TestimonialID]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required>{{ $testimonial->Content }}</textarea>
            </div>

            <div class="form-group">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ $testimonial->PublishDate }}" required>
            </div>

            <div class="form-group">
                <label for="testimonials_image">Testimonials Image:</label>
                <input type="file" class="form-control-file" id="testimonials_image" name="testimonials_image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update Testimonial</button>
            <a href="{{ route('member.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
