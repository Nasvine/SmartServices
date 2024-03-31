<?php

namespace App\Models\admin\boutique;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'description',
        'category_produit_id',
        'prix',
        'boutique_id',
        'lienPhoto',
    ];

    public function boutique(){
        return $this->belongsTo(Livraison::class);
    }

    public function category_produit(){
        return $this->belongsTo(Category_produit::class);
    }
}
