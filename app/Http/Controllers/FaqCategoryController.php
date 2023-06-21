<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqCategories = FaqCategory::with('questions')->get();
        return view('faq-categories.index', compact('faqCategories'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return view('faq-categories.create');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            FaqCategory::create($validatedData);

            // Redirection ou autre traitement après la création de la catégorie

            return redirect()->route('faq-categories.index');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = FaqCategory::findOrFail($id);
        $categories = FaqCategory::with('questions')->get();
        return view('faq-categories.show', compact('category', 'categories'));
    }
    
    public function edit(FaqCategory $faqCategory)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return view('faq-categories.edit', compact('faqCategory'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $faqCategory->update($validatedData);

            // Redirection ou autre traitement après la mise à jour de la catégorie

            return redirect()->route('faq-categories.index');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $faqCategory->delete();

            // Redirection ou autre traitement après la suppression de la catégorie

            return redirect()->route('faq-categories.index');
        } else {
            return redirect()->route('login');
        }
    }
}
