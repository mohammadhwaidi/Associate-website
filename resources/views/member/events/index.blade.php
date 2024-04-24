@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>All Events</h1>

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

        <a href="{{ route('member.events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-3">

                    <div class="card">
                        <img src="{{ asset($event->events_image) }}" class="card-img-top" alt="Event Image">

                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text">Event Date: {{ $event->event_date }}</p>
                            <p class="card-text">Location: {{ $event->location }}</p>
                            <a href="{{ route('member.events.edit', ['id' => $event->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('member.events.destroy', ['id' => $event->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('member.events.show', ['id' => $event->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('member.events.show_enrollments', ['id' => $event->id]) }}" class="btn btn-info mt-2">Show Enrollments</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
