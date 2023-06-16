@extends('layouts.app')

@section('content')
    <h1>FAQ</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>

        <ul>
            @foreach ($category->questions as $question)
                <li>
                    <strong>{{ $question->question }}</strong><br>
                    {{ $question->answer }}
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection
