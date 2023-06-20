<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'image', 'tendence', 'price', 'price_of', 'brefDesc', 'Quantite', 'categories_parent', 'marque', 'idC',"Promotion",'datePromo','Glissier'
    ];
}
