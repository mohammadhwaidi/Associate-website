@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Stories</h1>

        <!-- Display success or error messages if any -->
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

        <!-- Link to create a new story -->
        <a href="{{ route('admin.stories.create') }}" class="btn btn-primary mb-3">Create Story</a>

        <!-- Display all stories -->
        <div class="row">
            @foreach($stories as $story)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Display story image -->
                        <img src="{{ asset($story->image) }}" class="card-img-top" alt="Story Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            <p class="card-text">{{ $story->content }}</p>
                            <p class="card-text"><small class="text-muted">Published: {{ $story->publish_date }}</small></p>
                            <!-- Edit, Remove, and Show buttons for the story -->
                            <a href="{{ route('admin.stories.edit', ['id' => $story->id]) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('admin.stories.destroy', ['id' => $story->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">Remove</button>
                            </form>
                            <a href="{{ route('admin.stories.show', ['id' => $story->id]) }}" class="btn btn-info">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
