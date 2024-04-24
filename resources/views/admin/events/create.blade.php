@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Create Event</h1>
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="events_image">Event Image:</label>
                <input type="file" id="events_image" name="events_image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
