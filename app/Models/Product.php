<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'type',
        'series',
        'main_image',
        'other_images', // Assurez-vous que cette colonne est bien remplissable
        'quantity',
    ];
}
