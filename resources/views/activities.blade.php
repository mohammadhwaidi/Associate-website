@extends('layout')

@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @foreach($activities as $activity)
                    <div class="card mb-4">
                        <img src="{{ asset($activity->image_path) }}" class="card-img-top" alt="Activity Image">
                        <div class="card-body text-center"> <!-- Added text-center class -->
                            <h5 class="card-title">{{ $activity->title }}</h5>
                            <p class="card-text">{{ $activity->description }}</p>
                            <p class="card-text"><small class="text-muted">Date: {{ $activity->activity_date }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="Pagination">
            <ul class="pagination justify-content-center">
                @if ($activities->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $activities->previousPageUrl() }}" rel="prev" aria-label="Previous">&lsaquo;</a>
                    </li>
                @endif

                @if ($activities->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $activities->nextPageUrl() }}" rel="next" aria-label="Next">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
