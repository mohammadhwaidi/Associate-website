@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Show Post</h1>

        <div class="card">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($post->images as $index => $image)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($post->images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset($image->image_path) }}" class="d-block w-100" alt="Post Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-muted">Published: {{ $post->publish_date }}</small></p>
            </div>
        </div>

        <a href="{{ route('member.posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
    </div>
@endsection
