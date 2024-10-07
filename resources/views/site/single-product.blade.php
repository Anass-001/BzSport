@extends('layouts.master')
@section('content')
    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="productCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Affichage de l'image principale comme première image du carousel -->
                            <div class="carousel-item active">
                                <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}"
                                    class="d-block w-100">
                            </div>

                            <!-- Images supplémentaires dans le carousel -->
                            @if (!empty($otherImages))
                                @foreach ($otherImages as $image)
                                    <div class="carousel-item">
                                        <img src="{{ Storage::url($image) }}" alt="Additional Image" class="d-block w-100">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Contrôles de navigation du carousel -->
                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>

                        <!-- Ajouter la description du produit ici -->
                        <p class="product-description">{{ $product->description }}</p>

                        <p class="single-product-pricing"><span>Available Sizes</span> XS - XL</p>

                        <div class="single-product-form">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <label for="size">Select Size:</label>
                                <select name="size" id="size">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <br>
                                <input type="number" name="quantity" placeholder="Quantity" min="1" value="1">
                                <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('single-product', $relatedProduct->id) }}">
                                    <img src="{{ Storage::url($relatedProduct->main_image) }}"
                                        alt="{{ $relatedProduct->name }}" width="80">
                                </a>
                            </div>
                            <h3>{{ $relatedProduct->name }}</h3>
                            <p class="product-price"><span>Available Sizes</span> XS - XL</p>
                            <!-- Remplacer "Add to Cart" par "Show Product" -->
                            <a href="{{ route('single-product', $relatedProduct->id) }}" class="cart-btn"><i
                                    class="fas fa-eye"></i> Show Product</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end more products -->
@endsection
