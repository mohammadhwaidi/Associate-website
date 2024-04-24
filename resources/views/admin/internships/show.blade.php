@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Internship Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $internship->title }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $internship->description }}</p>
                <p class="card-text"><strong>Start Date:</strong> {{ $internship->start_date }}</p>
                <p class="card-text"><strong>End Date:</strong> {{ $internship->end_date }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $internship->location }}</p>
                <p class="card-text"><strong>Available:</strong> {{ $internship->available ? 'Yes' : 'No' }}</p>
                @if ($internship->internship_image)
                    <img src="{{ asset($internship->internship_image) }}" class="img-fluid" alt="Internship Image">
                @else
                    <p>No image available</p>
                @endif
                <a href="{{ route('admin.internships.edit', ['id' => $internship->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.internships.destroy', ['id' => $internship->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this internship?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('admin.internships.index') }}" class="btn btn-secondary">Back to Internships</a>
            </div>
        </div>
    </div>
@endsection
