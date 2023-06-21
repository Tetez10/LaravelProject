<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;



class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->except(['index', 'show']);
    }
    
    public function index()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }
    
    
    public function create()
    {
        
        return view('create');
    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image',
            'content' => 'required',
            'publishing_date' => 'required|date',
        ]);
    
        $article = new Article;
        $article->title = $validatedData['title'];
        // Gérer l'enregistrement de l'image de couverture (téléchargement, stockage, etc.)
        $coverImage = $validatedData['cover_image'];
        $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
        $coverImage->storeAs('public/cover_images', $coverImageName);
        $article->cover_image = $coverImageName;
        $article->content = $validatedData['content'];
        $article->publishing_date = $validatedData['publishing_date'];
        $article->save();
    
        return redirect()->route('home')->with('success', 'Article created successfully.');
    }

    public function edit($id)
{
    $article = Article::findOrFail($id);
    return view('edit', compact('article'));
}

    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'cover_image' => 'image',
            'content' => 'required',
            'publishing_date' => 'required|date',
        ]);
    
        $article = Article::findOrFail($id);
        $article->title = $validatedData['title'];
        // Gérer la mise à jour de l'image de couverture si une nouvelle image est téléchargée
        if ($request->hasFile('cover_image')) {
            // Supprimer l'ancienne image de couverture
            Storage::delete('public/cover_images/' . $article->cover_image);
    
            // Enregistrer la nouvelle image de couverture
            $coverImage = $validatedData['cover_image'];
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->storeAs('public/cover_images', $coverImageName);
            $article->cover_image = $coverImageName;
        }
        $article->content = $validatedData['content'];
        $article->publishing_date = $validatedData['publishing_date'];
        $article->save();
    
        return redirect()->route('home')->with('success', 'Article updated successfully.');
    }
    

public function destroy($id)
{
    $article = Article::findOrFail($id);
    Storage::delete('public/cover_images/' . $article->cover_image); // Supprimer l'image de couverture associée à l'article
    $article->delete();

    return redirect()->route('home')->with('success', 'Article deleted successfully.');
}

    
}
