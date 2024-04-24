@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Activities</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.activities.create') }}" class="btn btn-primary mb-3">Create Activity</a>

        <div class="row">
            @foreach($activities as $activity)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($activity->image_path) }}" class="card-img-top" alt="Activity Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->title }}</h5>
                            <p class="card-text">{{ $activity->description }}</p>
                            <p class="card-text"><small class="text-muted">Date: {{ $activity->activity_date }}</small></p>
                            <a href="{{ route('admin.activities.show', ['id' => $activity->id]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.activities.edit', ['id' => $activity->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.activities.destroy', ['id' => $activity->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
