@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h2>User Details</h2>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back</a>

        <table class="table">
            <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role:</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ $user->status }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
