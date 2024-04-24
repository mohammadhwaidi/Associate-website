@extends('member.dashboard')

@section('content2')
    <div class="container">
        <h1>All Internships</h1>

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

        <a href="{{ route('member.internships.create') }}" class="btn btn-primary mb-3">Create New Internship</a>

        <div class="row">
            @foreach($internships as $internship)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset($internship->internship_image) }}" class="card-img-top" alt="Internship Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $internship->title }}</h5>
                            <p class="card-text">{{ $internship->description }}</p>
                            <p class="card-text">Start Date: {{ $internship->start_date }}</p>
                            <p class="card-text">End Date: {{ $internship->end_date }}</p>
                            <p class="card-text">Location: {{ $internship->location }}</p>
                            <a href="{{ route('member.internships.edit', ['id' => $internship->id]) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete form here -->
                            <form action="{{ route('member.internships.destroy', ['id' => $internship->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this internship?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('member.internships.show', ['id' => $internship->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('member.internships.show_enrollments', ['id' => $internship->id]) }}" class="btn btn-info mt-2">Show Enrollments</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
