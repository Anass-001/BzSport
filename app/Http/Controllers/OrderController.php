<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;

class OrderController extends Controller
{
    // Afficher le formulaire de commande
    public function create()
    {
        $cart = session()->get('cart', []); // Récupérer le panier de la session
        return view('site.order.create', compact('cart')); // Passer le panier à la vue
    }

    public function success()
    {
        return view('site.order.success');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        // Créer un nouveau client
        $client = Client::create($request->only('first_name', 'last_name', 'phone', 'address'));

        // Récupérer le panier de la session
        $cart = session()->get('cart', []);
        $totalProducts = 0;
        $totalPrice = 0;

        // Créer une commande
        $order = $client->orders()->create([
            'total_products' => 0,
            'total_price' => 0,
        ]);

        // Calculer le total de produits et le prix et attacher chaque taille séparément
        foreach ($cart as $productId => $product) {
            foreach ($product['sizes'] as $size => $details) {
                $quantity = $details['quantity'];
                $price = $details['price'];

                // Mise à jour des totaux
                $totalProducts += $quantity;
                $totalPrice += $price * $quantity;

                // Attacher chaque taille comme une ligne distincte
                $order->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $price,
                    'size' => $size,
                ]);

                // Log pour vérifier l'attachement
                \Log::info('Product attached:', [
                    'product_id' => $productId,
                    'size' => $size,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }
        }

        // Mettre à jour le total des produits et le prix total dans la commande
        $order->update([
            'total_products' => $totalProducts,
            'total_price' => $totalPrice,
        ]);

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }



    public function index()
    {
        $orders = Order::paginate(10, ['*'], 'orders_page')->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

    // Détails d'une commande avec les produits et tailles
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Calculer le prix total
    private function calculateTotalPrice($cart)
    {
        $total = 0;

        foreach ($cart as $productData) {
            foreach ($productData['sizes'] as $details) {
                $total += $details['total_price']; // Additionner le prix total de chaque taille
            }
        }

        return $total;
    }

    public function showOrderForm()
    {
        $cart = session()->get('cart', []); // Récupère le panier de la session
        return view('order.form', compact('cart')); // Passe le panier à la vue
    }
    // modifier une commande
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    // Mettre à jour une commande
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_price' => 'required|numeric',
            'address' => 'required|string',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    // Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}
