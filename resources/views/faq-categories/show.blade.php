@if($category->questions->isEmpty())
    <p>No questions in this category.</p>
@else
    <ul class="list-group">
        @foreach($category->questions as $question)
            <li class="list-group-item">
                <h5>{{ $question->question }}</h5>
                <p class="mb-0">{{ $question->answer }}</p>
                @if($question->admin_answer)
                    <p class="mb-0">Admin's Answer: {{ $question->admin_answer }}</p>
                @else
                    @if(Auth::check() && Auth::user()->isAdmin())
                        <form action="{{ route('faq-questions.answer', $question->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="admin_answer">Admin's Answer</label>
                                <textarea name="admin_answer" id="admin_answer" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                @endif
                @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="btn-group" role="group">
                        <a href="{{ route('faq-questions.edit', $question->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('faq-questions.destroy', $question->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    <a href="{{ route('faq-categories.index') }}" class="btn btn-primary">Back to categories</a>
@endif
