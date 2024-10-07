@extends('layouts.master')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h2>Women</h2>
                        <h1>Sale</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row product-lists">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ url('single-product/' . $product->id) }}">
                                    <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}">

                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"> {{ $product->price }}DH </p>
                            <a href="{{ url('single-product/' . $product->id) }}" class="cart-btn">
                                Show Product
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                        <div class="text-center">
                            <h1>No sales for Today</h1>
                            <h2>but it will be soon</h2>
                            <h3>stay tuned </h3>
                            <p>
                                <img src="{{ url('assets/img/no-sales.png') }}" alt="" class="img-fluid"
                                    style="max-width: 300px; height: auto;">
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination (si nécessaire) -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links() }} <!-- Pour la pagination, si vous utilisez paginate() -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products section -->
@endsection
