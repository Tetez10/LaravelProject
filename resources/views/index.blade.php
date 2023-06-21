@extends('layouts.app')

@section('content')

<div class="container">

    <h1>All Users</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            User added successfully!
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->role == 1)
                        Admin
                    @else
                        User
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if (Auth::check() && Auth::user()->isAdmin())
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
    @endif

</div>

@endsection
