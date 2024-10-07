@extends('layouts.admin')

@section('content')
    <h1>Détails du client</h1>

    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <td>{{ $client->first_name }} {{ $client->last_name }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $client->phone }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $client->address }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Retour à la liste des clients</a>
@endsection
