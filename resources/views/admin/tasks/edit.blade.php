@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Modifier la Tâche</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Ajoutez ceci pour spécifier que c'est une requête PUT -->
                    <!-- Indique que c'est une mise à jour -->

                    <!-- Titre -->
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
                    </div>

                    <!-- Date d'échéance -->
                    <div class="form-group">
                        <label for="due_date">Date d'échéance :</label>
                        <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
                    </div>

                    <!-- Statut -->
                    <div class="form-group">
                        <label for="status">Statut :</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Complétée
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à jour la tâche</button>
                    <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
