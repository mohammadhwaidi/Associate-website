@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

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

        <form method="POST" action="{{ route('admin.posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
            </div>

            <!-- Publish Date -->
            <div class="form-group">
                <label for="publish_date">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ $post->publish_date }}">
            </div>

            <!-- Image Upload Section -->
            <div class="form-group">
                <label for="posts_images">Posts Images:</label>
                <input type="file" class="form-control-file" id="posts_images" name="posts_images[]" accept="image/*" multiple>
                <small class="form-text text-muted">Select multiple images (hold Ctrl/Cmd to select multiple)</small>
            </div>

            <!-- Image Preview Section -->
            <div class="form-group">
                <label>Selected Images Preview:</label>
                <div id="image-preview-container" class="d-flex flex-wrap">
                    @foreach($post->images as $image)
                        <img src="{{ asset($image->image_path) }}" class="preview-image mr-2 mb-2" style="max-width: 150px; max-height: 150px;" alt="Post Image">
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a> <!-- Cancel button -->
        </form>
    </div>
@endsection
