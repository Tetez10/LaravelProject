@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Question</h1>

        <form action="{{ route('faq-questions.update', $faqQuestion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $faqQuestion->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $faqQuestion->question }}" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ $faqQuestion->answer }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
