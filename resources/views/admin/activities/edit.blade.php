@extends('admin.dashboard')


@section('content')
    <div class="container">
        <h1>Edit Activity</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.activities.update', ['id' => $activity->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $activity->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $activity->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="activity_date">Activity Date</label>
                <input type="date" class="form-control" id="activity_date" name="activity_date" value="{{ $activity->activity_date }}">
            </div>

            <div class="form-group">
                <label for="activities_image">Image</label>
                <input type="file" class="form-control-file" id="activities_image" name="activities_image">
            </div>

            <button type="submit" class="btn btn-primary">Update Activity</button>
            <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
