@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                    @if (Auth::user() && Auth::user()->isAdmin())
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                    @endif

                    <div class="articles">
                        @foreach ($articles as $article)
                            <div class="article">
                                <h2>{{ $article->title }}</h2>
                                <img src="{{ asset('storage/cover_images/' . $article->cover_image) }}" alt="Cover Image" style="max-width: 500px">
                                <p>{{ $article->content }}</p>
                                <p>Publishing Date: {{ $article->publishing_date }}</p>
                                @if (Auth::user() && Auth::user()->isAdmin())
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary">Edit</a>
                                @endif
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
