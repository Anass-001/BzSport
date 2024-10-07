@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Détails de la Tâche</h4>
            </div>

            <div class="card-body">
                <h5><strong>Titre :</strong> {{ $task->title }}</h5>
                <p><strong>Description :</strong> {{ $task->description }}</p>
                <p><strong>Date d'échéance :</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</p>
                <p><strong>Statut :</strong> {{ $task->status }}</p>

                <div class="mt-3">
                    <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">Retour à la liste des tâches</a>
                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-warning">Modifier</a>
                    <!-- Ajoutez ici d'autres actions comme supprimer si nécessaire -->
                </div>
            </div>
        </div>
    </div>
@endsection
