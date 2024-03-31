<?php

namespace App\Models\admin\commandes;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\commandes\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'quantite',
        'nom_du_produit',
        'prix',

    ];


    public function commande(){
        return $this->belongsTo(Commande::class);
    }
    
}
