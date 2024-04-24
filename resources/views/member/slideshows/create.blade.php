@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Create New SlideShow</h1>

        <form method="POST" action="{{ route('member.slideshows.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="caption">Caption:</label>
                <textarea class="form-control" id="caption" name="caption" required></textarea>
            </div>

            <div class="form-group">
                <label for="slideshow_image">SlideShow Image:</label>
                <input type="file" class="form-control-file" id="slideshow_image" name="slideshow_image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Create SlideShow</button>
        </form>
    </div>
@endsection
