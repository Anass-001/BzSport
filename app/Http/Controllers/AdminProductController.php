<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9, ['*'], 'products_page')->withQueryString();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'type' => 'required|string',
            'series' => 'required|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'quantity' => 'required|integer|min:0',
        ]);

        // Stockage de l'image principale
        $mainImagePath = $request->file('main_image')->store('products', 'public');

        // Stockage des images supplémentaires
        $otherImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $otherImages[] = $image->store('products', 'public');
            }
        }

        // Enregistrement du produit dans la base de données
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'type' => $request->type,
            'series' => $request->series,
            'main_image' => $mainImagePath,
            'other_images' => json_encode($otherImages), // Stockage des chemins des images sous forme de JSON
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // Validation des données
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'type' => 'required',
            'series' => 'required',
            'quantity' => 'required|integer',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mise à jour des champs de base
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->type = $request->type;
        $product->series = $request->series;
        $product->quantity = $request->quantity;

        // Mise à jour de l'image principale
        if ($request->hasFile('main_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->main_image) {
                Storage::delete($product->main_image);
            }

            // Stocker la nouvelle image et sauvegarder le chemin
            $path = $request->file('main_image')->store('products');
            $product->main_image = $path;
        }

        // Mise à jour des images supplémentaires
        if ($request->hasFile('images')) {
            // Supprimer les anciennes images si elles existent
            if ($product->other_images) {
                foreach (json_decode($product->other_images) as $image) {
                    Storage::delete($image);
                }
            }

            // Stocker les nouvelles images et sauvegarder les chemins
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products');
            }
            $product->other_images = json_encode($images);
        }

        // Sauvegarder les modifications
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Produit mis à jour avec succès.');
    }
    public function deleteImage($id, Request $request)
    {
        $product = Product::find($id);

        if ($product && $request->has('image')) {
            $otherImages = json_decode($product->other_images, true);
            $imageToDelete = $request->input('image');

            // Retirer l'image de la liste et mettre à jour le produit
            if (($key = array_search($imageToDelete, $otherImages)) !== false) {
                unset($otherImages[$key]);
                $product->other_images = json_encode(array_values($otherImages));
                $product->save();

                // Supprimer physiquement l'image du stockage si nécessaire
                Storage::delete($imageToDelete);

                return back()->with('success', 'Image supprimée avec succès.');
            }
        }

        return back()->with('error', 'Échec de la suppression de l\'image.');
    }
    //show products for admin
    public function adminShow($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }
    // delete products for admin

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Produit supprimé avec succès');
    }
}
