@extends('member.dashboard')
@section('content2')
    <div class="container">
        <h1>Activity Details</h1>

        <div class="card">
            <img src="{{ asset($activity->image_path) }}" class="card-img-top" alt="Activity Image">
            <div class="card-body">
                <h5 class="card-title">{{ $activity->title }}</h5>
                <p class="card-text">{{ $activity->description }}</p>
                <p class="card-text"><small class="text-muted">Date: {{ $activity->activity_date }}</small></p>
            </div>
        </div>

        <a href="{{ route('member.activities.index') }}" class="btn btn-secondary mt-3">Back to Activities</a>
    </div>
@endsection
