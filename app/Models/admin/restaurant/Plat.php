<?php

namespace App\Models\admin\restaurant;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\restaurant\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\admin\restaurant\Category_plat;

class Plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'lienPhoto',
        'restaurant_id',
        'category_plat_id',
        'promotion_id',
        'ligne_commande_id',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function category_plat(){
        return $this->belongsTo(Category_plat::class);
    }
}
