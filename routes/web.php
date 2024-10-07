<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/tset', function () {
//     return view('tses');
// });

// Groupe de routes pour les produits
Route::prefix('products')->group(function () {
    // Routes pour la catégorie "Man"
    Route::get('/man/AllProducts', [ProductController::class, 'allProductsForMen'])->name('products.man.AllProducts');
    Route::get('/man/tshirts-tops', [ProductController::class, 'tshirtsTopsForMen'])->name('products.man.tshirts-tops');
    Route::get('/man/pants', [ProductController::class, 'pantsForMen'])->name('products.man.pants');
    Route::get('/man/hoodies', [ProductController::class, 'hoodiesForMen'])->name('products.man.hoodies');
    Route::get('/man/shorts', [ProductController::class, 'shortsForMen'])->name('products.man.shorts');

    // Routes pour la catégorie "Women"
    Route::get('/women/all-products', [ProductController::class, 'allProductsForWomen'])->name('products.women.all-products');
    Route::get('/women/tshirts-tops', [ProductController::class, 'tshirtsTopsForWomen'])->name('products.women.tshirts-tops');
    Route::get('/women/bras', [ProductController::class, 'SportsBrasForWomen'])->name('products.women.bras');
    Route::get('/women/leggings', [ProductController::class, 'LeggingsForWomen'])->name('products.women.leggings');
    Route::get('/women/pants', [ProductController::class, 'pantsForWomen'])->name('products.women.pants');
    Route::get('/women/hoodies', [ProductController::class, 'hoodiesForWomen'])->name('products.women.hoodies');
    Route::get('/women/shorts', [ProductController::class, 'shortsForWomen'])->name('products.women.shorts');

    // Routes pour "New"
    Route::get('/new/All-Products', [ProductController::class, 'newAllProduct'])->name('products.new.All-Products');
    Route::get('/new/for-men', [ProductController::class, 'newForMen'])->name('products.new.for-men');
    Route::get('/new/for-women', [ProductController::class, 'newForWomen'])->name('products.new.for-women');

    // Routes pour "Sale"
    Route::get('/sale/All-Products', [ProductController::class, 'saleAllProduct'])->name('products.sale.All-Products');
    Route::get('/sale/for-men', [ProductController::class, 'saleForMen'])->name('products.sale.for-men');
    Route::get('/sale/for-women', [ProductController::class, 'saleForWomen'])->name('products.sale.for-women');
    // la recherche de produit
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
});
// route pour single-product
Route::get('/single-product/{id}', [ProductController::class, 'show'])->name('single-product');
// panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
// Routes pour la gestion des commandes
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order', [OrderController::class, 'showOrderForm'])->name('order.form');

// Routes pour gérer les commandes dans l'administration
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index'); // Afficher toutes les commandes
Route::get('/admin/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit'); // Modifier une commande
Route::put('/admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update'); // Mettre à jour une commande
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy'); // Supprimer une commande


//admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Protect admin routes with middleware
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
// la gestion des produit
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('product', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::get('product/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('product', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::get('product/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('product/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::delete('product/{id}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('product/{id}', [AdminProductController::class, 'adminShow'])->name('admin.product.show');
    Route::delete('product/{id}/delete-image', [AdminProductController::class, 'deleteImage'])->name('admin.product.deleteImage');
});
// la gestion des commandes
Route::prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
});
//gestion des clients
Route::prefix('admin')->group(function () {
    Route::get('clients', [ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('clients/{id}', [ClientController::class, 'show'])->name('admin.clients.show');
    Route::get('clients/create', [ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('clients/{id}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('clients/{id}', [ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('clients/{id}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');
});
//gestion des taches
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('admin.tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('admin.tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('admin.tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('admin.tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');
});
//gestion de profil
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // Route pour afficher la page des paramètres du profil
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

    // Route pour mettre à jour les informations du profil
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // Optionnel : Route pour mettre à jour le mot de passe
    Route::put('/settings/password', [AdminController::class, 'updatePassword'])->name('admin.settings.password.update');
});

require __DIR__ . '/auth.php';
