@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Create New Story</h1>

        <!-- Form for creating a new story -->
        <form method="POST" action="{{ route('admin.stories.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title input -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Content input -->
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>

            <!-- Publish date input (hidden by default) -->
            <div class="form-group" style="display: none;">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Image upload input -->
            <div class="form-group">
                <label for="story_image">Story Image:</label>
                <input type="file" class="form-control-file" id="story_image" name="story_image" accept="image/*" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Create Story</button>
        </form>
    </div>
@endsection
