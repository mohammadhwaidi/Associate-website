@extends('layout')

@section('content1')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center mb-4">Testimonials</h2>

                <!-- Testimonial Form -->
                <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="content">Leave Feedback:</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="publish_date">Publish Date:</label>
                        <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="testimonials_image">Upload Your Image:</label>
                        <input type="file" class="form-control-file" id="testimonials_image" name="testimonials_image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                </form>

                <!-- Display Testimonials -->
                <div class="row mt-4">
                    @foreach($testimonials as $testimonial)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ $testimonial->TestimonialImage }}" class="card-img-top rounded-circle" alt="{{ $testimonial->user->name }}" style="width: 75px; height: 75px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $testimonial->user->name }}</h5>
                                    <p class="card-text">{{ $testimonial->Content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
