<?php

namespace App\Models\admin\livraisons;

use App\Models\User;
use App\Models\admin\livreurs\Livreur;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\commandes\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'adresse_depart',
        'adresse_arrivee',
        'type_de_livraison',
        'type_de_colis',
        'messageLivreur',
        'status_livraison',
        'date_livraison',
        'prix',
        'mode_de_paiement',
        'commande_id',
        'livreur_id',
        'restaurant_id',
        'boutique_id',
        'montant_total',
        'user_id',
        'gestionnaire_id',
        'livraison_date'
    ];


    public function commande(){
        return $this->belongsTo(Commande::class);
    }

    public function livreur_name(){
        return $this->belongsTo(Livreur::class, 'livreur_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }
}
