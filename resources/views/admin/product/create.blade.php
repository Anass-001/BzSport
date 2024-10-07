@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Ajouter un nouveau produit</h4>
                    </div>

                    <div class="card-body">
                        <!-- Affichage des erreurs -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulaire de création du produit -->
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nom du produit -->
                            <div class="form-group mb-3">
                                <label for="name">Nom du produit :</label>
                                <input type="text" name="name" class="form-control" placeholder="Nom du produit"
                                    required>
                            </div>

                            <!-- Description du produit -->
                            <div class="form-group mb-3">
                                <label for="description">Description :</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description du produit" required></textarea>
                            </div>

                            <!-- Prix -->
                            <div class="form-group mb-3">
                                <label for="price">Prix :</label>
                                <input type="number" class="form-control" name="price" placeholder="Prix du produit"
                                    required>
                            </div>

                            <!-- Catégorie -->
                            <div class="form-group mb-3">
                                <label for="category">Catégorie :</label>
                                <select name="category" class="form-control" required>
                                    <option value="Men">Hommes</option>
                                    <option value="Women">Femmes</option>
                                </select>
                            </div>

                            <!-- Type de produit -->
                            <div class="form-group mb-3">
                                <label for="type">Type de produit :</label>
                                <select name="type" class="form-control" required>
                                    <option value="">Sélectionnez un type de produit</option>
                                    <optgroup label="Hommes">
                                        <option value="T-shirts & Tops">T-shirts & Tops</option>
                                        <option value="Pants">Pantalons</option>
                                        <option value="Hoodies">Sweatshirts & Hoodies</option>
                                        <option value="Shorts">Shorts</option>
                                    </optgroup>
                                    <optgroup label="Femmes">
                                        <option value="T-shirts & Tops">T-shirts & Tops</option>
                                        <option value="Leggings">Leggings</option>
                                        <option value="Bras">Soutiens-gorge de sport</option>
                                        <option value="Hoodies">Sweatshirts & Hoodies</option>
                                        <option value="Shorts">Shorts</option>
                                        <option value="Pants">Pantalons</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Série (Nouveau, En solde, etc.) -->
                            <div class="form-group mb-3">
                                <label for="series">Série :</label>
                                <select name="series" class="form-control" required>
                                    <option value="new">Nouveau</option>
                                    <option value="sale">En solde</option>
                                    <option value="bestseller">Meilleures ventes</option>
                                </select>
                            </div>

                            <!-- Image principale -->
                            <div class="form-group mb-3">
                                <label for="main_image">Image principale :</label>
                                <input type="file" name="main_image" class="form-control-file" required>
                                <small class="form-text text-muted">Sélectionnez l'image principale du produit.</small>
                            </div>

                            <!-- Images supplémentaires -->
                            <div class="form-group mb-3">
                                <label for="images">Images supplémentaires (jusqu'à 4 images) :</label>
                                <input type="file" name="images[]" class="form-control-file" multiple required>
                                <small class="form-text text-muted">Vous pouvez sélectionner jusqu'à 4 images.</small>
                            </div>

                            <!-- Quantité disponible -->
                            <div class="form-group mb-3">
                                <label for="quantity">Quantité disponible :</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Quantité en stock"
                                    required>
                            </div>

                            <!-- Boutons -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Ajouter le produit</button>
                                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
