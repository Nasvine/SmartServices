<?php

namespace App\Models\admin\notes;

use App\Models\admin\livreurs\Livreur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livreur(){
        return $this->belongsTo(Livreur::class);
    }
}
