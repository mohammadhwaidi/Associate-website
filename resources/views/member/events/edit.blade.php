@extends('member.dashboard')

@section('content2')
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

        <form method="POST" action="{{ route('member.events.update', ['id' => $event->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
            </div>

            <!-- Event Date -->
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date }}">
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="events_image">Event Image:</label>
                <input type="file" class="form-control-file" id="events_image" name="events_image">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Event</button>
            <a href="{{ route('member.events.index') }}" class="btn btn-secondary">Cancel</a> <!-- Cancel button -->
        </form>
    </div>
@endsection
