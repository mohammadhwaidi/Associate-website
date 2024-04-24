@extends('layout')

@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @forelse($internships as $internship)
                    <div class="card mb-4">
                        <img src="{{ asset($internship->internship_image) }}" class="card-img-top" alt="Internship Image">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $internship->title }}</h2>
                            <p class="card-text">{{ $internship->description }}</p>
                            <p class="card-text">Start Date: {{ $internship->start_date }}</p>
                            <p class="card-text">End Date: {{ $internship->end_date }}</p>
                            <p class="card-text">Location: {{ $internship->location }}</p>
                            <a href="{{ route('internshipEn') }}" class="btn btn-primary">Join Us</a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p>No internships found.</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $internships->onFirstPage() ? 'disabled' : '' }}" aria-disabled="{{ $internships->onFirstPage() ? 'true' : 'false' }}">
                            <a class="page-link" href="{{ $internships->previousPageUrl() }}" rel="prev" aria-label="Previous">&lsaquo;</a>
                        </li>
                        <li class="page-item {{ $internships->hasMorePages() ? '' : 'disabled' }}" aria-disabled="{{ $internships->hasMorePages() ? 'false' : 'true' }}">
                            <a class="page-link" href="{{ $internships->nextPageUrl() }}" rel="next" aria-label="Next">&rsaquo;</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
