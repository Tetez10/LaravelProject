<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

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

        // Envoyer l'e-mail à l'administrateur
        $adminEmail = 'tetezzz0307@gmail.com';
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $message = $validatedData['message'];

        // Créer une instance du Mailable et envoyer l'e-mail
        Mail::to($adminEmail)->send(new ContactFormMailable($name, $email, $message));

        // Rediriger l'utilisateur vers la page de contact avec un message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}
