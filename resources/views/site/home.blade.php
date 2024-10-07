@extends('layouts.master')

@section('content')
    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">It's Your Time !</p>
                            <h1>Be Your Own Hero</h1>
                            <div class="hero-btns">
                                <a href="{{ route('products.new.All-Products') }}" class="cart-btn">New In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- new arrivals -->
    <!-- New Arrivals -->
    @if ($newArrivals->isNotEmpty())
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">New Ar</span>rivals</h3>
                            <p>Discover our latest arrivals in sport clothing, designed for comfort, performance, and style.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="newArrivalsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($newArrivals->chunk(3) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $product)
                                        <div class="col-lg-4 col-md-6 text-center">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ Storage::url($product->main_image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                <h4>{{ $product->name }}</h4>
                                                <p class="product-price">{{ $product->price }} DH</p>
                                                <a href="{{ url('single-product/' . $product->id) }}" class="cart-btn"><i
                                                        class="fas fa-eye"></i> Show
                                                    Product</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#newArrivalsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#newArrivalsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    @endif


    <!-- end new arrivals -->

    <!-- best sellers -->
    <!-- Best Sellers -->
    @if ($bestSellers->isNotEmpty())
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Best </span>Sellers</h3>
                            <p>Discover our best sellers, featuring the most popular and highly-rated products chosen by our
                                customers.</p>
                        </div>
                    </div>
                </div>

                <div id="bestSellersCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($bestSellers->chunk(3) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $product)
                                        <div class="col-lg-4 col-md-6 text-center">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ Storage::url($product->main_image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                <h4>{{ $product->name }}</h4>
                                                <p class="product-price">{{ $product->price }} DH</p>
                                                <a href="{{ url('single-product/' . $product->id) }}" class="cart-btn"><i
                                                        class="fas fa-eye"></i> Show
                                                    Product</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#bestSellersCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#bestSellersCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    @endif
    <!--End Best Sallers-->
    <!--Sales-->
    <!-- Sale -->
    @if ($sale->isNotEmpty())
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Sa</span>le</h3>
                            <p>Explore our exclusive sale selection, featuring top-quality products at unbeatable
                                prices—don't miss out!</p>
                        </div>
                    </div>
                </div>

                <div id="saleCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sale->chunk(3) as $index => $chunk)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $product)
                                        <div class="col-lg-4 col-md-6 text-center">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ Storage::url($product->main_image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                <h4>{{ $product->name }}</h4>
                                                <p class="product-price">{{ $product->price }} DH</p>
                                                <a href="{{ url('single-product/' . $product->id) }}"
                                                    class="cart-btn">Show Product</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#saleCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#saleCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- End sale-->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p>When order over 500Dh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="content">
                            <h3>Cash On Delivery</h3>
                            <p>Pay easily upon delivery.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
