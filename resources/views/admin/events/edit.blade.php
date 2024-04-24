@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>

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

        <form method="POST" action="{{ route('admin.events.update', ['id' => $event->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}">
                @error('title')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $event->description) }}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date) }}">
                @error('event_date')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $event->location) }}">
                @error('location')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="events_image">Event Image:</label>
                <input type="file" class="form-control-file" id="events_image" name="events_image">
                @error('events_image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
