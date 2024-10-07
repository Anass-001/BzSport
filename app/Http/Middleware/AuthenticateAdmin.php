<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    // Affiche le formulaire de login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Gère l'authentification des admins
    public function login(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Récupérer les informations d'identification
        $credentials = $request->only('email', 'password');

        // Tentative d'authentification avec les informations d'identification fournies
        if (Auth::guard('admin')->attempt($credentials)) {
            // Si l'authentification réussit, rediriger vers le tableau de bord
            return redirect()->route('admin.dashboard');
        }

        // Si l'authentification échoue, revenir au formulaire de login avec une erreur
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Gère la déconnexion des admins
    public function logout()
    {
        // Déconnexion de l'admin
        Auth::guard('admin')->logout();

        // Redirection vers le formulaire de login admin
        return redirect()->route('admin.login');
    }
}
