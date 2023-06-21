@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of FAQ Categories</h1>

        @if(Auth::check())
            @if(auth()->user()->isAdmin())
                <a href="{{ route('faq-categories.create') }}" class="btn btn-primary">Add a category</a>
                <a href="{{ route('faq-question.create') }}" class="btn btn-primary">Add Question</a>
            @endif
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqCategories as $faqCategory)
                    <tr>
                        <td>{{ $faqCategory->name }}</td>
                        <td>
                            <a href="{{ route('faq-categories.show', $faqCategory) }}" class="btn btn-primary">View</a>
                            @if(Auth::check())
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('faq-categories.edit', $faqCategory) }}" class="btn btn-primary">Edit</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
