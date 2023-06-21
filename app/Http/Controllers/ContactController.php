<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function send(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        // Enregistrer le message dans la base de données
        $message = new Message();
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->save();
    
        // Rediriger l'utilisateur vers la page de contact avec un message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}    
