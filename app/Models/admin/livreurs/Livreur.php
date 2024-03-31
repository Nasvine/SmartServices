<?php

namespace App\Models\admin\livreurs;

use App\Models\admin\courses\Course;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\notes\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'first_name',
        'last_name',
        'phone',
        'birth_day',
        'adress',
        'photo',
        'sexe',
        'email',
        'disponibilite',
        'nbre_livraison',
        'nbre_commande',
        'nbre_course',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note(){
        return $this->hasOne(Note::class);
    }


    public function livraisons(){
        return $this->belongsToMany(Livraison::class);
    }


    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
