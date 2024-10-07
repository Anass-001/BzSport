@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h1>Détails de la commande #{{ $order->id }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Date de commande :</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                <p><strong>Prix total :</strong> {{ $order->total_price }} Dh</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Produits dans la commande</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID du produit</th>
                            <th>Nom</th>
                            <th>Taille</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail" style="width: 80px; height: 80px;">
                                </td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->size }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Retour aux commandes</a>
        </div>
    </div>
@endsection
