<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Nom de la table (optionnel si le nom de la table suit les conventions de Laravel)
    protected $table = 'tasks';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status'
    ];

    // Si tu as besoin de modifier le format de la date, tu peux utiliser $casts pour convertir automatiquement les dates
    protected $casts = [
        'due_date' => 'date', // Assure que 'due_date' est converti en objet Carbon
    ];
}
