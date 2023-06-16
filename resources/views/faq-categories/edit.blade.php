@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit the category FAQ</h1>

        <form action="{{ route('faq-categories.update', $faqCategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Champ de formulaire pour le nom de la catégorie -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $faqCategory->name }}" required>
            </div>

            <!-- Bouton de soumission du formulaire -->
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

        <form action="{{ route('faq-categories.destroy', $faqCategory->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie FAQ ?')">Supprimer</button>
        </form>
    </div>
@endsection
