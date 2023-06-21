<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqQuestion;
use Illuminate\Support\Facades\Auth;
use App\Models\FaqCategory; 


class FaqQuestionController extends Controller
{

    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
    
        return view('faq.index', compact('categories'));
    }
    public function create()
{
    $categories = FaqCategory::all();
    return view('faq-questions.create', compact('categories'));
}

    public function answer(Request $request, FaqQuestion $faqQuestion)
{
    // Vérification de l'autorisation
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        abort(403, 'Accès refusé');
    }

    // Validation des données
    $validatedData = $request->validate([
        'admin_answer' => 'required',
    ]);

    // Enregistrement de la réponse de l'administrateur
    $faqQuestion->admin_answer = $validatedData['admin_answer'];
    $faqQuestion->save();

    return redirect()->route('faq-categories.show', $faqQuestion->category_id)
        ->with('success', 'Réponse ajoutée avec succès.');
}
public function edit(FaqQuestion $faqQuestion)
{
    // Vérification de l'autorisation
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        abort(403, 'Accès refusé');
    }

    $categories = FaqCategory::all();
    return view('faq-questions.edit', compact('faqQuestion', 'categories'));
}




public function store(Request $request)
{
    // Vérification de l'autorisation
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        abort(403, 'Accès refusé');
    }

    // Validation des données
    $validatedData = $request->validate([
        'category_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
    ]);

    // Création de la question et réponse FAQ
    $faqQuestion = new FaqQuestion();
    $faqQuestion->category_id = $validatedData['category_id'];
    $faqQuestion->question = $validatedData['question'];
    $faqQuestion->answer = $validatedData['answer'];
    $faqQuestion->save();

    return redirect()->route('faq-categories.index')->with('success', 'Question et réponse FAQ ajoutées avec succès.');
}

public function update(Request $request, $id)
{
    // Vérification de l'autorisation
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        abort(403, 'Accès refusé');
    }

    // Validation des données
    $validatedData = $request->validate([
        'category_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
    ]);

    // Mise à jour de la question
    $faqQuestion = FaqQuestion::findOrFail($id);
    $faqQuestion->category_id = $validatedData['category_id'];
    $faqQuestion->question = $validatedData['question'];
    $faqQuestion->answer = $validatedData['answer'];
    $faqQuestion->save();

    return redirect()->route('faq-categories.index')->with('success', 'Question mise à jour avec succès.');
}



    public function destroy(FaqQuestion $faqQuestion)
    {
        // Vérification de l'autorisation
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }

        // Suppression de la question et réponse FAQ
        $faqQuestion->delete();

        return redirect()->route('faq-categories.index')->with('success', 'Question et réponse FAQ supprimées avec succès.');
    }
}
