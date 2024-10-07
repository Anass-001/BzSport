@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Liste des produits</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Ajouter un produit</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} Dh</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>


                        <td>
                            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-sm btn-info">Afficher</a>
                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->appends(request()->query())->links() }}

    </div>
@endsection
