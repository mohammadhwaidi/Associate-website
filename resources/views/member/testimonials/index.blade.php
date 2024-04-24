@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Testimonials</h1>

        <a href="{{ route('member.testimonials.create') }}" class="btn btn-primary mb-3">Create Testimonial</a>

        <div class="row">
            @forelse($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($testimonial->TestimonialImage) }}" class="card-img-top" alt="Testimonial Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $testimonial->Content }}</h5>
                            <p class="card-text">Published Date: {{ $testimonial->PublishDate }}</p>
                            <a href="{{ route('member.testimonials.show', ['id' => $testimonial->TestimonialID]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('member.testimonials.edit', ['id' => $testimonial->TestimonialID]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('member.testimonials.destroy', ['id' => $testimonial->TestimonialID]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No testimonials found.</p>
            @endforelse
        </div>
    </div>
@endsection
