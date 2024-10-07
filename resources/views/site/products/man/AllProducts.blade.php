@extends('layouts.master')

@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h2>Men</h2>
                        <h1>All Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <!-- You can add product filtering options here if needed -->
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <!-- Afficher l'image du produit avec vérification si elle existe -->
                                <a href="{{ url('single-product/' . $product->id) }}">
                                    <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}">

                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price">{{ $product->price }} DH</p>
                            <a href="{{ url('single-product/' . $product->id) }}" class="cart-btn" class="cart-btn"><i
                                    class="fas fa-eye"></i> Show Product</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination (if you have pagination enabled) -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links() }} <!-- Utilise pagination si elle est activée dans le contrôleur -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products section -->
@endsection
