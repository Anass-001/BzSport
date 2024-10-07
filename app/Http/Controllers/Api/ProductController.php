<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    // Méthodes pour les produits pour hommes
    public function allProductsForMen()
    {
        $products = Product::where('category', 'Men')->paginate(10);
        return response()->json($products);
    }

    public function tshirtsTopsForMen()
    {
        $products = Product::where('type', 'T-shirts & Tops')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    public function pantsForMen()
    {
        $products = Product::where('type', 'Pants')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    public function hoodiesForMen()
    {
        $products = Product::where('type', 'Hoodies')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    public function shortsForMen()
    {
        $products = Product::where('type', 'Shorts')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    // Méthodes pour les produits pour femmes
    public function allProductsForWomen()
    {
        $products = Product::where('category', 'Women')->paginate(10);
        return response()->json($products);
    }

    public function sportsBrasForWomen()
    {
        $products = Product::where('type', 'Bras')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    public function leggingsForWomen()
    {
        $products = Product::where('type', 'Leggings')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    public function tshirtsTopsForWomen()
    {
        $products = Product::where('type', 'T-shirts & Tops')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    public function pantsForWomen()
    {
        $products = Product::where('type', 'Pants')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    public function hoodiesForWomen()
    {
        $products = Product::where('type', 'Hoodies')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    public function shortsForWomen()
    {
        $products = Product::where('type', 'Shorts')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    // Méthodes pour les nouveautés
    public function newForMen()
    {
        $products = Product::where('series', 'New')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    public function newForWomen()
    {
        $products = Product::where('series', 'New')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    // Méthodes pour les soldes
    public function saleForMen()
    {
        $products = Product::where('series', 'Sale')
            ->where('category', 'Men')
            ->paginate(10);
        return response()->json($products);
    }

    public function saleForWomen()
    {
        $products = Product::where('series', 'Sale')
            ->where('category', 'Women')
            ->paginate(10);
        return response()->json($products);
    }

    // Tous les produits en solde
    public function saleAllProduct()
    {
        $products = Product::where('series', 'Sale')->paginate(10);
        return response()->json($products);
    }

    // Tous les nouveaux produits
    public function newAllProduct()
    {
        $products = Product::where('series', 'New')->paginate(10);
        return response()->json($products);
    }

    // Afficher un produit avec des produits similaires
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        // Décodage des images supplémentaires
        $otherImages = json_decode($product->other_images, true);

        return response()->json([
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'otherImages' => $otherImages
        ]);
    }

    // Méthode de recherche
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Recherche des produits par nom ou description
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        // Retourner les résultats au format JSON
        return response()->json($products);
    }
}
