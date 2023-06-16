<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{

public function show()
{
    $user = Auth::user(); // Récupérer l'utilisateur connecté

    return view('profile', compact('user'));
}
public function update(Request $request)
{
    $user = auth()->user();

    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'nullable|string|max:255',
        'birthday' => 'nullable|date',
        'about' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Mettre à jour le nom de l'utilisateur s'il est fourni
    if ($request->filled('name')) {
        $user->name = $validatedData['name'];
    }

    // Mettre à jour les autres champs du profil s'ils sont fournis
    if ($request->filled('birthday')) {
        $user->birthday = $validatedData['birthday'];
    }

    if ($request->filled('about')) {
        $user->about = $validatedData['about'];
    }

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatars', 'public');
        $user->avatar = $avatarPath;
    }

    $user->save();

    return redirect()->route('profile')->with('success', 'Profiel bijgewerkt!');
}



public function updatePassword(Request $request)
{
    $user = auth()->user();

    // Validez les données de modification de mot de passe
    $validatedData = $request->validate([
        'current_password' => 'required|password',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Mettez à jour le mot de passe de l'utilisateur
    $user->password = Hash::make($validatedData['new_password']);
    $user->save();

    return redirect()->route('profile')->with('success', 'Wachtwoord bijgewerkt!');
}

}


