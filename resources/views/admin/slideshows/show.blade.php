@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Show SlideShow</h1>

        <div class="card">
            <img src="{{ asset($slideshow->SlideshowImage) }}" class="card-img-top" alt="SlideShow Image">
            <div class="card-body">
                <h5 class="card-title">{{ $slideshow->Title }}</h5>
                <p class="card-text">{{ $slideshow->Caption }}</p>
            </div>
        </div>

        <a href="{{ route('admin.slideshows.index') }}" class="btn btn-secondary mt-3">Back to SlideShows</a>
    </div>
@endsection
