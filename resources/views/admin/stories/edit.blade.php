@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Story</h1>

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

        <!-- Form for editing an existing story -->
        <form method="POST" action="{{ route('admin.stories.update', ['id' => $story->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title input -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $story->title }}" required>
            </div>

            <!-- Content input -->
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required>{{ $story->content }}</textarea>
            </div>

            <!-- Publish date input -->
            <div class="form-group">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ $story->publish_date }}" required>
            </div>

            <!-- Image upload input -->
            <div class="form-group">
                <label for="story_image">Story Image:</label>
                <input type="file" class="form-control-file" id="story_image" name="story_image">
            </div>

            <!-- Submit and Cancel buttons -->
            <button type="submit" class="btn btn-primary">Update Story</button>
            <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
