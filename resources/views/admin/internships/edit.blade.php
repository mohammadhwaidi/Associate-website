@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Internship</h1>
        <form action="{{ route('admin.internships.update', ['id' => $internship->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $internship->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required>{{ $internship->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $internship->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $internship->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ $internship->location }}" required>
            </div>

            <div class="form-group">
                <label for="internship_image">Internship Image:</label>
                <input type="file" id="internship_image" name="internship_image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="available">Available:</label>
                <select id="available" name="available" class="form-control" required>
                    <option value="1" @if($internship->available == 1) selected @endif>Yes</option>
                    <option value="0" @if($internship->available == 0) selected @endif>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Internship</button>
        </form>
    </div>
@endsection
