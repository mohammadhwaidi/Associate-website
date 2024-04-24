@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Testimonial Details</h1>

        <div class="card">
            <img src="{{ asset($testimonial->TestimonialImage) }}" class="card-img-top" alt="Testimonial Image">
            <div class="card-body">
                <h5 class="card-title">{{ $testimonial->Content }}</h5>
                <p class="card-text">Published Date: {{ $testimonial->PublishDate }}</p>
                <p class="card-text">User ID: {{ $testimonial->UserID }}</p>
            </div>
        </div>

        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">Back to Testimonials</a>
    </div>
@endsection
