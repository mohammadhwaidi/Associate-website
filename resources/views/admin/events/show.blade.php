@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Event Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">Event Date: {{ $event->event_date }}</p>
                <p class="card-text">Location: {{ $event->location }}</p>
                <!-- Add any other event details to display -->
            </div>
        </div>

        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
    </div>
@endsection
