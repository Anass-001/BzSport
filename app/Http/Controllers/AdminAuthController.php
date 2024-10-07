<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // Assure-toi que cette vue existe dans resources/views/admin/login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirection après connexion réussie vers le dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Redirection après échec de la connexion
        return redirect()->back()->withErrors('Invalid credentials');
    }

    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->currentAccessToken()->delete(); // Supprime le jeton actuel

        return response()->json(['message' => 'Déconnexion réussie.'], 200);
    }
}
