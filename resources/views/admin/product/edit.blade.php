@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Modifier le produit : {{ $product->name }}</h2>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de modification du produit -->
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom du produit</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="category">Catégorie</label>
                <input type="text" name="category" id="category" class="form-control"
                    value="{{ old('category', $product->category) }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control"
                    value="{{ old('type', $product->type) }}" required>
            </div>

            <div class="form-group">
                <label for="series">Série</label>
                <input type="text" name="series" id="series" class="form-control"
                    value="{{ old('series', $product->series) }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity" class="form-control"
                    value="{{ old('quantity', $product->quantity) }}" min="0" required>
            </div>

            <div class="form-group">
                <label for="main_image">Image principale</label>
                <input type="file" name="main_image" id="main_image" class="form-control">
                @if ($product->main_image)
                    <p>Image actuelle :</p>
                    <img src="{{ Storage::url($product->main_image) }}" alt="{{ $product->name }}" width="150">
                @endif
            </div>

            <div class="form-group">
                <label for="images">Images supplémentaires</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                @if ($product->other_images)
                    <p>Images actuelles :</p>
                    <div class="d-flex flex-wrap">
                        @foreach (json_decode($product->other_images) as $image)
                            <div class="mr-3 mb-3">
                                <img src="{{ Storage::url($image) }}" alt="Image additionnelle" width="100">
                                {{-- <form action="{{ route('admin.product.deleteImage', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="image" value="{{ $image }}">
                                    <HR>
                                    </form> --}}
                                <button type="submit" id="" class="btn btn-sm btn-danger mt-1">Supprimer</button>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <button class="btn btn-primary">Enregistrer les modifications</button>
            <script></script>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

@endsection
