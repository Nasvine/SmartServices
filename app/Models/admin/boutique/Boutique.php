<?php

namespace App\Models\admin\boutique;

use App\Models\admin\boutique\Produit;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\boutique\Category_produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boutique extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom_boutique',
        'adresse_boutique',
        'telephone',
        'email',
        'ville',
        'description',
        'photo',
        'user_id',
    ];

    public function produits(){
        return $this->hasMany(Produit::class);
    }

    public function category_produits(){
        return $this->belongsToMany(Category_produit::class);
    }
}
