@extends('layouts.master')

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Section -->

    <!-- Cart Section -->
    @if (empty($cart) || count($cart) === 0)
        <div class="col-lg-12 text-center">
            <h2>Your Cart is Empty</h2>
            <p>It looks like you haven't added any products to your cart yet.</p>
            <hr>
            <img src="{{ url('/assets/img/noitem.png') }}" alt="No items in cart">
            <hr>
            <a href="{{ url('/') }}" class="boxed-btn">Continue Shopping</a>
            <hr>
        </div>
    @else
        <div class="cart-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-size">Size</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $id => $item)
                                        @foreach ($item['sizes'] as $size => $details)
                                            <tr class="table-body-row">
                                                <td class="product-remove">
                                                    <a href="{{ route('cart.remove', $id) }}">
                                                        <i class="far fa-window-close"></i>
                                                    </a>
                                                </td>
                                                <td class="product-image">
                                                    @if (isset($item['main_image']))
                                                        <img src="{{ Storage::url($item['main_image']) }}"
                                                            alt="{{ $item['name'] }}">
                                                    @else
                                                        <img src="{{ url('/assets/img/no-image.png') }}"
                                                            alt="No image available">
                                                    @endif
                                                </td>
                                                <td class="product-name">{{ $item['name'] }}</td>
                                                <td class="product-size">{{ $size }}</td>
                                                <td class="product-price">{{ $details['price'] }} Dh</td>
                                                <td class="product-quantity">{{ $details['quantity'] }}</td>
                                                <td class="product-total">{{ $details['total_price'] }} Dh</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="total-section">
                            <table class="total-table">
                                <thead class="total-table-head">
                                    <tr class="table-total-row">
                                        <th>Total</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="total-data">
                                        <td><strong>Subtotal: </strong></td>
                                        <td>{{ $totalPrice }} Dh</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td>
                                            @if ($totalPrice >= 500)
                                                0 Dh
                                            @else
                                                25 Dh
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Total: </strong></td>
                                        <td>{{ $totalPrice + ($totalPrice >= 500 ? 0 : 25) }} Dh</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">
                                <a href="{{ route('cart.clear') }}" class="boxed-btn" style="background-color: red;"
                                    onclick="return confirm('Are you sure you want to clear the cart?');">Clear Cart</a>

                                <a href="{{ route('order.create') }}" class="boxed-btn"
                                    style="background-color: green;">Place the Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
