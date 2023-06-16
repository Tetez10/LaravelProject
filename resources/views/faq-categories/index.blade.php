@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of categories  FAQ</h1>

        @if (auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('faq-categories.create') }}" class="btn btn-primary">Add an category</a>
            <a href="{{ route('faq-question.create') }}" class="btn btn-primary">Add Question</a>

            
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqCategories as $faqCategory)
                    <tr>
                        <td>{{ $faqCategory->name }}</td>
                        <td>
                            <a href="{{ route('faq-categories.show', $faqCategory) }}" class="btn btn-primary">Voir</a>
                            @if (auth()->check() && auth()->user()->isAdmin())
                                <a href="{{ route('faq-categories.edit', $faqCategory) }}" class="btn btn-primary">Modifier</a>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
