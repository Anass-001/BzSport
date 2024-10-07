<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Afficher le tableau de bord de l'admin
    public function index()
    {
        // Récupérer les commandes d'aujourd'hui
        $todayOrders = Order::whereDate('created_at', Carbon::today())->get();

        // Récupérer les produits avec un stock inférieur à 3
        $lowStockProducts = Product::where('quantity', '<', 3)->get();

        // Récupérer les tâches du jour
        $todayTasks = Task::whereDate('due_date', Carbon::today())->get();

        // Passer les données à la vue
        return view('admin.dashboard', [
            'todayOrders' => $todayOrders,
            'lowStockProducts' => $lowStockProducts,
            'todayTasks' => $todayTasks, // Passer les tâches à la vue
        ]);
    }

    // Afficher le formulaire de connexion admin
    public function showLoginForm()
    {
        return view('admin.login'); // Vérifie que cette vue existe
    }

    // Gérer la connexion de l'admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirection après connexion réussie vers le dashboard admin
            return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie');
        }

        // Redirection après échec de la connexion
        return redirect()->back()->withErrors('Identifiants incorrects.');
    }

    // Déconnexion de l'admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }

    // Afficher la page des paramètres du profil admin
    public function settings()
    {
        $admin = Auth::guard('admin')->user(); // Récupérer l'admin actuellement connecté
        return view('admin.settings', compact('admin'));
    }

    // Mettre à jour les informations de l'admin (nom et email)
    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour la photo
        ]);

        $admin = Auth::guard('admin')->user();

        // Si une photo a été uploadée
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $admin->profile_photo = $path;
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_photo' => $admin->profile_photo,
        ]);

        return redirect()->route('admin.settings')->with('success', 'Profil mis à jour avec succès.');
    }


    // Mettre à jour le mot de passe de l'admin
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        // Vérifier si l'ancien mot de passe est correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour avec le nouveau mot de passe
        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('admin.settings')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
