<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gebruikers</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
