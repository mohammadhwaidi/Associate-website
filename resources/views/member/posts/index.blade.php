@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Posts</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('member.posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div id="carouselExampleControls_{{ $post->id }}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($post->images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        @if (strpos($image->image_path, '.mp4') !== false || strpos($image->image_path, '.mov') !== false || strpos($image->image_path, '.avi') !== false)
                                            <!-- Video -->
                                            <video controls class="d-block w-100">
                                                <source src="{{ asset($image->image_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <!-- Image -->
                                            <img src="{{ asset($image->image_path) }}" class="d-block w-100" alt="Post Image">
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleControls_{{ $post->id }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls_{{ $post->id }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text"><small class="text-muted">Published: {{ $post->publish_date }}</small></p>
                            <a href="{{ route('member.posts.edit', ['id' => $post->id]) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('member.posts.destroy', ['id' => $post->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">Remove</button>
                            </form>
                            <a href="{{ route('member.posts.show', ['id' => $post->id]) }}" class="btn btn-info">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
