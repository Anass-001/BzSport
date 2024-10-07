<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;

class OrderController extends Controller
{
    // Créer une nouvelle commande
    public function store(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'client.first_name' => 'required|string|max:255',
            'client.last_name' => 'required|string|max:255',
            'client.phone' => 'required|string|max:15',
            'client.address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.size' => 'required|string',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        // Création du client
        $client = Client::create($request->input('client'));

        // Création de la commande
        $order = new Order();
        $order->client_id = $client->id;
        $order->total_price = collect($request->input('products'))->sum(function ($product) {
            return $product['price'] * $product['quantity'];
        });
        $order->save();

        // Sauvegarde des produits dans la table pivot 'order_product'
        foreach ($request->input('products') as $productData) {
            $order->products()->attach($productData['id'], [
                'size' => $productData['size'],
                'quantity' => $productData['quantity'],
                'price' => $productData['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'Order placed successfully',
            'order' => $order,
        ], 201);
    }

    // Afficher une commande spécifique
    public function show($id)
    {
        $order = Order::with('client', 'products')->findOrFail($id);

        return response()->json($order);
    }

    // Afficher toutes les commandes
    public function index()
    {
        $orders = Order::with('client', 'products')->paginate(10);

        return response()->json($orders);
    }

    // Mettre à jour une commande
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validation des données reçues pour la mise à jour
        $request->validate([
            'client.first_name' => 'required|string|max:255',
            'client.last_name' => 'required|string|max:255',
            'client.phone' => 'required|string|max:15',
            'client.address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.size' => 'required|string',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        // Mise à jour du client
        $client = $order->client;
        $client->update($request->input('client'));

        // Mise à jour des produits associés
        $order->products()->detach();  // Détacher les anciens produits
        foreach ($request->input('products') as $productData) {
            $order->products()->attach($productData['id'], [
                'size' => $productData['size'],
                'quantity' => $productData['quantity'],
                'price' => $productData['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Mise à jour du prix total
        $order->total_price = collect($request->input('products'))->sum(function ($product) {
            return $product['price'] * $product['quantity'];
        });
        $order->save();

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order,
        ]);
    }

    // Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach();  // Supprimer les relations avec les produits
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
