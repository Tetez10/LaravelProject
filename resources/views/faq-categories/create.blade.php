@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add an category FAQ</h1>
        <form action="{{ route('faq-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name of category</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez le nom de la catégorie">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        

        <!-- Formulaire de création de catégorie FAQ ici -->

    </div>
@endsection
