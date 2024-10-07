<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Lister tous les clients avec pagination
    public function index()
    {
        $clients = Client::paginate(10); // 10 clients par page
        return response()->json($clients);
    }

    // Afficher un client spécifique par son ID
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    // Ajouter un nouveau client
    public function store(Request $request)
    {
        // Validation des données du client
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Création du client
        $client = Client::create($request->all());

        return response()->json([
            'message' => 'Client created successfully',
            'client' => $client,
        ], 201);
    }

    // Mettre à jour un client existant
    public function update(Request $request, $id)
    {
        // Validation des données mises à jour
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Trouver le client et mettre à jour les données
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return response()->json([
            'message' => 'Client updated successfully',
            'client' => $client,
        ]);
    }

    // Supprimer un client
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully']);
    }
}
