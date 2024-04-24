@extends('layout')

@section('content1')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Create Enrollment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('storeEventEnrollment') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="event_id">Event:</label>
                                <select class="form-control" name="event_id" required>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" style="display: none;">
                                <label for="enrollment_date">Enrollment Date:</label>
                                <input class="form-control" type="date" name="enrollment_date" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input class="form-control" type="text" name="full_name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input class="form-control" type="text" name="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" name="address" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Create Enrollment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
