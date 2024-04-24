@extends('layout')

@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @forelse($events as $event)
                    <div class="card mb-4">
                        <img src="{{ asset($event->events_image) }}" class="card-img-top" alt="Event Image">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $event->title }}</h2>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text">Event Date: {{ $event->event_date }}</p>
                            <p class="card-text">Location: {{ $event->location }}</p>
                            <a href="{{ route('eventsEn') }}" class="btn btn-primary">Join Us</a>
                        </div>
                    </div>
                @empty
                    <p>No events found.</p>
                @endforelse

                <!-- Pagination -->
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center">
                        @if ($events->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $events->previousPageUrl() }}" rel="prev" aria-label="Previous">&lsaquo;</a>
                            </li>
                        @endif

                        @if ($events->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $events->nextPageUrl() }}" rel="next" aria-label="Next">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
