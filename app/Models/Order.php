<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'total_products', 'created_at'];

    /**
     * Relation avec les produits dans la commande
     * Utilise une table pivot pour gérer les détails supplémentaires (taille, quantité, et prix)
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('size', 'quantity', 'price', 'created_at', 'updated_at');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
