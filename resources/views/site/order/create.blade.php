@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Place Your Order</h2>
        <form action="{{ route('order.store') }}" method="POST" class="p-4 bg-light rounded shadow">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    placeholder="Enter your first name" required aria-label="First Name">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    placeholder="Enter your last name" required aria-label="Last Name">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Enter your phone number" required aria-label="Phone">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Enter your address" rows="3" required
                    aria-label="Address"></textarea>
            </div>

            <div class="mb-3">
                <h4>Products in Cart</h4>
                @foreach ($cart as $productId => $productData)
                    @foreach ($productData['sizes'] as $size => $details)
                        <input type="hidden" name="products[{{ $productId }}][size]" value="{{ $size }}">
                        <input type="hidden" name="products[{{ $productId }}][quantity]"
                            value="{{ $details['quantity'] }}">
                        <div class="alert alert-primary d-flex justify-content-between align-items-center" role="alert">
                            <span>Product ID: {{ $productId }} | Size: {{ $size }} | Quantity:
                                {{ $details['quantity'] }}</span>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 animate__animated animate__pulse">Place
                Order</button>
        </form>
    </div>
@endsection
