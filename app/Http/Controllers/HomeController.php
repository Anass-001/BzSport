<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model
use App\Models\Category; // Assuming you have a Category model

class HomeController extends Controller
{
    // Method definition
    public function index()
    {
        $newArrivals = Product::where('series', 'new')->get(); // Récupérer les nouveaux arrivages
        $bestSellers = Product::where('series', 'bestseller')->get(); // Récupérer les meilleures ventes
        $sale = Product::where('series', 'sale')->get();

        return view('site.home', compact('newArrivals', 'bestSellers', 'sale'));
    }
}
