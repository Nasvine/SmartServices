<?php

namespace App\Models\admin\courses;

use App\Models\admin\livreurs\Livreur;
use App\Models\admin\notifications\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'adresse_depart',
        'adresse_livraison',
        'status_livraison',
        'date_de_livraison',
        'heure_de_confirmation',
        'montant_total',
        'prix',
        'mode_de_paiement',
        'user_id',
        'livreur_id',
        'gestionnaire_id',
        'numero_client',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livreur(){
        return $this->hasOne(Livreur::class);
    }

    public function notifications(){
        return $this->belongsToMany(Notification::class);
    }
}
