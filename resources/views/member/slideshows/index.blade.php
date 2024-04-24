@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>SlideShows</h1>

        <!-- Display success or error messages here if needed -->

        <a href="{{ route('member.slideshows.create') }}" class="btn btn-primary mb-3">Create SlideShow</a>

        <div class="row">
            @foreach($slideshows as $slideshow)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($slideshow->SlideshowImage) }}" class="card-img-top" alt="SlideShow Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $slideshow->Title }}</h5>
                            <p class="card-text">{{ $slideshow->Caption }}</p>
                            <a href="{{ route('member.slideshows.edit', ['id' => $slideshow->SlideshowID]) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('member.slideshows.destroy', ['id' => $slideshow->SlideshowID]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">Remove</button>
                            </form>
                            <a href="{{ route('member.slideshows.show', ['id' => $slideshow->SlideshowID]) }}" class="btn btn-info">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
