<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create FAQ Question</div>

                <div class="card-body">
                    <form action="{{ route('faq-questions.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" rows="3" class="form-control" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
