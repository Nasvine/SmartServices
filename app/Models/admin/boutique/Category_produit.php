<?php

namespace App\Models\admin\boutique;

use App\Models\admin\boutique\Produit;
use App\Models\admin\boutique\Boutique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'boutique_id',
   ];


    public function produits(){
        return $this->hasMany(Produit::class);
    }

    public function boutiques(){
        return $this->belongsToMany(Boutique::class);
    }

    /* public function boutique_id(){
        return $this->belongsToMany(Boutique::class, 'boutique_id');
    } */
}
