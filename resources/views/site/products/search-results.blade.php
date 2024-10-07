@extends('layouts.master')

@section('content')
    <div class="container mt-5 text-center">
        <h2 class="mb-4">Search Results for "{{ $query }}"</h2>

        @if ($products->isEmpty())
            <p class="mt-4">No products found.</p>
        @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.show', $product->id) }} class="cart-btn>
                                    <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}">

                                </a>
                            </div>
                            <h4>{{ $product->name }}</h4>
                            <p class="product-price">{{ $product->price }} DH</p>

                            <a href="{{ url('single-product/' . $product->id) }}" class="cart-btn">
                                Show Product
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
