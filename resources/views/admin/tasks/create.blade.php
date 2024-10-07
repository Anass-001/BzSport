@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Créer une nouvelle tâche</h1>

        <!-- Formulaire de création de tâche -->
        <form action="{{ route('admin.tasks.store') }}" method="POST">
            @csrf

            <!-- Titre de la tâche -->
            <div class="form-group">
                <label for="title">Titre de la tâche</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <!-- Description de la tâche -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <!-- Date limite -->
            <div class="form-group">
                <label for="due_date">Date limite</label>
                <input type="date" name="due_date" id="due_date" class="form-control" required>
            </div>

            <!-- Statut de la tâche avec choix prédéfinis -->
            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="En attente">En attente</option>
                    <option value="En cours">En cours</option>
                    <option value="Complétée">Complétée</option>
                    <option value="Annulée">Annulée</option>
                </select>
            </div>

            <!-- Bouton pour créer la tâche -->
            <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
        </form>
    </div>
@endsection
