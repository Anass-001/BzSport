@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Gestion des Clients</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->address }}</td>
                        <td>
                            <a href="{{ route('admin.clients.show', $client->id) }}" class="btn btn-info">Voir</a>
                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form> <!-- Action pour contacter via WhatsApp -->
                            <a href="https://wa.me/{{ $client->phone }}?text=Bonjour {{ $client->first_name }}, nous vous contactons depuis l'administration de notre boutique."
                                target="_blank" class="btn btn-success">
                                <i class="fab fa-whatsapp"></i> Contact
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            {{ $clients->appends(request()->query())->links() }}

    </div>
@endsection
