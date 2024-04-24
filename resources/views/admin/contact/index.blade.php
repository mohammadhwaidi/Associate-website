@extends('admin.dashboard')


@section('content')
    <div class="container">
        <h1>Contact Messages</h1>

        @if (count($contactMessages) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contactMessages as $message)
                    <tr>
                        <td>{{ $message->ContactUsID }}</td>
                        <td>{{ $message->Name }}</td>
                        <td>{{ $message->Email }}</td>
                        <td>{{ $message->PhoneNumber }}</td>
                        <td>{{ $message->Message }}</td>
                        <td>
                            <a href="{{ route('admin.contact.show', $message->ContactUsID) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No messages found.</p>
        @endif
    </div>
@endsection
