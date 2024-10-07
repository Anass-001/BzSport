@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">Ajouter une nouvelle tâche</a>
        <hr>
        <h4>Liste des tâches</h4>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date d'échéance</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a href="{{ route('admin.tasks.show', $task->id) }}">{{ $task->title }}</a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                        <td> {{ $task->status }}
                        </td>
                        <td>
                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tasks->appends(request()->query())->links() }}
    </div>
@endsection
