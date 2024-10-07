<?php


namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Order;

class ClientController extends Controller
{
    // Afficher la liste des clients (optionnel si tu veux lister tous les clients)
    public function index()
    {
        // Utilise paginate() au lieu de all() pour paginer les résultats
        $clients = Client::paginate(10); // Par exemple, 10 clients par page
        return view('admin.clients.index', compact('clients'));
    }

    // Afficher les détails d'un client spécifique
    public function show($id)
    {
        $client = Client::findOrFail($id);  // Trouver un client par ID
        return view('admin.clients.show', compact('client'));
    }

    // Optionnel : Ajouter un nouveau client (si tu veux permettre la création manuelle de clients)
    public function create()
    {
        return view('admin.clients.create');
    }

    // Optionnel : Sauvegarder un nouveau client dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('admin.clients.index')->with('success', 'Client ajouté avec succès');
    }

    // Optionnel : Modifier un client existant
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    // Optionnel : Mettre à jour un client existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('admin.clients.index')->with('success', 'Client mis à jour avec succès');
    }

    // Optionnel : Supprimer un client
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client supprimé avec succès');
    }
}
