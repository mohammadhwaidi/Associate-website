@extends('member.dashboard')


@section('content2')
    <div class="container">
        <h1>Create New Activity</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('member.activities.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="activity_date">Activity Date:</label>
                <input type="date" class="form-control" id="activity_date" name="activity_date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="activities_image">Activity Image:</label>
                <input type="file" class="form-control-file" id="activities_image" name="activities_image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Activity</button>
        </form>
    </div>
@endsection
