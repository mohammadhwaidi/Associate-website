@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>Edit SlideShow</h1>

        <form method="POST" action="{{ route('member.slideshows.update', ['id' => $slideshow->SlideshowID]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $slideshow->Title }}" required>
            </div>

            <div class="form-group">
                <label for="caption">Caption:</label>
                <textarea class="form-control" id="caption" name="caption" required>{{ $slideshow->Caption }}</textarea>
            </div>

            <div class="form-group">
                <label for="slideshow_image">SlideShow Image:</label>
                <input type="file" class="form-control-file" id="slideshow_image" name="slideshow_image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update SlideShow</button>
            <a href="{{ route('member.slideshows.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
