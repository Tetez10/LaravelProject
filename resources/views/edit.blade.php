@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Article') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ $article->title }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="cover_image">{{ __('Cover Image') }}</label>
                            <input id="cover_image" type="file" class="form-control" name="cover_image">
                            @if ($article->cover_image)
                                <img src="{{ asset('storage/cover_images/' . $article->cover_image) }}" alt="Cover Image">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea id="content" class="form-control" name="content" rows="5" required>{{ $article->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="publishing_date">{{ __('Publishing Date') }}</label>
                            <input id="publishing_date" type="date" class="form-control" name="publishing_date" value="{{ $article->publishing_date }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>

                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
