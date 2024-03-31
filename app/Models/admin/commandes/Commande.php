<?php

namespace App\Models\admin\commandes;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\commandes\LigneCommande;
use App\Models\admin\livreurs\Livreur;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_commande',
        'type_de_commande',
        'status_commande',
        'addresse_depart',
        'addresse_livraison',
        'mode_paiement',
        'montant_total',
        'montant_commande',
        'user_id',
        'livreur_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livraisons(){
        return $this->hasMany(Livraison::class);
    }

    public function livreur(){
        return $this->belongsTo(Livreur::class);
    }

    public function ligne_commandes(){
        return $this->hasMany(LigneCommande::class);
    }
}
