@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Create New Post</h1>

        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>

            <!-- Publish Date -->
            <div class="form-group" style="display: none;">
                <label for="publish_date">Publish Date:</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Image Upload Section -->
            <div class="form-group">
                <label for="posts_images">Posts Images:</label>
                <input type="file" class="form-control-file" id="posts_images" name="posts_images[]" accept="image/*,video/*" multiple required>
                <small class="form-text text-muted">Select multiple images (hold Ctrl/Cmd to select multiple)</small>
            </div>

            <!-- Image Preview Section -->
            <div class="form-group">
                <label>Selected Images Preview:</label>
                <div id="image-preview-container" class="d-flex flex-wrap"></div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // JavaScript to preview selected images
        const fileInput = document.getElementById('posts_images');
        const imagePreviewContainer = document.getElementById('image-preview-container');

        fileInput.addEventListener('change', function () {
            const files = this.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('preview-image');
                    img.style.maxWidth = '150px'; // Adjust image size if needed
                    img.style.maxHeight = '150px'; // Adjust image size if needed
                    img.style.marginRight = '10px'; // Adjust spacing between images if needed
                    img.style.marginBottom = '10px'; // Adjust spacing between images if needed
                    imagePreviewContainer.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
