@extends('admin.dashboard')


@section('content')
    <div class="container">
        <h1>Contact Message Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $message->ContactUsID }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $message->Name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $message->Email }}</p>
                <p class="card-text"><strong>Phone Number:</strong> {{ $message->PhoneNumber }}</p>
                <p class="card-text"><strong>Message:</strong> {{ $message->Message }}</p>
                <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Back to Messages</a>
            </div>
        </div>
    </div>
@endsection

