@extends('layouts.admin')

@section('content')
    <h1>Gestion des Commandes</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de commande</th>
                <th>Prix total</th>
                <th>Adresse</th>
                <th>Client</th>
                <th>Produits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->total_price }} DH</td>
                    <td>{{ $order->client ? $order->client->address : 'Adresse non disponible' }}</td>
                    <td>
                        @if ($order->client)
                            <a href="{{ route('admin.clients.show', $order->client->id) }}">
                                {{ $order->client->first_name }} {{ $order->client->last_name }}
                            </a>
                        @else
                            Client non disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}">Voir les produits</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination pour les commandes -->
    {{ $orders->appends(request()->query())->links() }}
@endsection
