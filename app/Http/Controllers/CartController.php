<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Display the cart
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $product) {
            foreach ($product['sizes'] as $details) {
                $totalPrice += $details['total_price'];
            }
        }

        return view('site.cart', compact('cart', 'totalPrice'));
    }

    // Add a product to the cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Récupérer la taille et la quantité du formulaire
        $size = $request->input('size', 'default');
        $quantity = $request->input('quantity', 1); // Quantité envoyée par le formulaire

        // Si le produit existe déjà dans le panier
        if (isset($cart[$id])) {
            if (isset($cart[$id]['sizes'][$size])) {
                // Si la taille existe déjà, mettre à jour la quantité et le prix total
                $cart[$id]['sizes'][$size]['quantity'] += $quantity;
                $cart[$id]['sizes'][$size]['total_price'] = $cart[$id]['sizes'][$size]['quantity'] * $product->price;
            } else {
                // Si la taille n'existe pas, ajouter une nouvelle taille
                $cart[$id]['sizes'][$size] = [
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "total_price" => $quantity * $product->price
                ];
            }
        } else {
            // Si le produit n'existe pas dans le panier, ajouter un nouveau produit
            $cart[$id] = [
                "name" => $product->name,
                "main_image" => $product->main_image, // Assure-toi que le modèle Product contient bien ce champ
                "sizes" => [
                    $size => [
                        "quantity" => $quantity,
                        "price" => $product->price,
                        "total_price" => $quantity * $product->price
                    ]
                ]
            ];
        }

        session()->put('cart', $cart);


        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Remove a product from the cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    // Clear the cart
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $size = $request->input('size', 'default');  // Si vous gérez les tailles
            $quantity = $request->input('quantity', 1);

            if (isset($cart[$id]['sizes'][$size])) {
                // Mettre à jour la quantité et le prix total
                $cart[$id]['sizes'][$size]['quantity'] = $quantity;
                $cart[$id]['sizes'][$size]['total_price'] = $quantity * $cart[$id]['sizes'][$size]['price'];
            }

            // Sauvegarder le panier mis à jour dans la session
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }
}
