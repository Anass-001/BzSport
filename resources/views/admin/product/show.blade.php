@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Détails du produit </h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nom : {{ $product->name }}</h5>
                <p class="card-text">Prix : {{ $product->price }} Dh</p>
                <p class="card-text">Description : {{ $product->description }}</p>
                <p class="card-text">Catégorie : {{ $product->category }}</p>
                <p class="card-text">Series : {{ $product->series }}</p>
                <p class="card-text">Type : {{ $product->type }}</p>
                <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}" style= "max-width: 200px;">

                <p class="card-text">Quantity: {{ $product->quantity }}</p>
                <!-- Ajoute d'autres champs si nécessaire -->
            </div>
        </div>

        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mt-3">Retour à la liste des produits</a>
    </div>
@endsection
