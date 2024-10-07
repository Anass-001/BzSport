@extends('layouts.admin')

@section('content')
    <h1>Modifier la Commande #{{ $order->id }}</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="total_price">Prix total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $order->total_price }}"
                required>
        </div>

        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control"
                value="{{ $order->client ? $order->client->address : '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Retour</a>
    </form>
@endsection
