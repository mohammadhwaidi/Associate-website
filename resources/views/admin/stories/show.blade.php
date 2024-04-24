@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Show Story</h1>

        <!-- Display details of the story -->
        <div class="card">
            <img src="{{ asset($story->image) }}" class="card-img-top" alt="Story Image">
            <div class="card-body">
                <h5 class="card-title">{{ $story->title }}</h5>
                <p class="card-text">{{ $story->content }}</p>
                <p class="card-text"><small class="text-muted">Published: {{ $story->publish_date }}</small></p>
            </div>
        </div>

        <!-- Back to Stories link -->
        <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary mt-3">Back to Stories</a>
    </div>
@endsection
