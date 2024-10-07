<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    // Afficher toutes les tâches
    public function index()
    {
        $tasks = Task::paginate(10, ['*'], 'tasks_page')->withQueryString();
        // Récupérer toutes les tâches
        return view('admin.tasks.index', compact('tasks'));
    }

    // Afficher le formulaire pour créer une nouvelle tâche
    public function create()
    {
        return view('admin.tasks.create');
    }

    // Stocker une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:' . Carbon::today(),
            'status' => 'required|string|max:80'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    // Afficher une tâche spécifique
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('admin.tasks.show', compact('task'));
    }

    // Afficher le formulaire pour éditer une tâche
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }
    // Mettre à jour une tâche
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:' . Carbon::today(),
            'status' => 'required|string|max:80'

        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status

        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }
    // Supprimer une tâche
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
