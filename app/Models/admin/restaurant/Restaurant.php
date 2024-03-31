<?php

namespace App\Models\admin\restaurant;

use App\Models\admin\restaurant\Plat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\admin\restaurant\Category_plat;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
         'nom_restaurant',
         'adresse_restaurant',
         'telephone',
         'email',
         'ville',
         'description',
         'photo',
         'user_id',
    ];

    public function plats(){
        return $this->hasMany(Plat::class);
    }

    public function category_plats(){
        return $this->belongsToMany(Category_plat::class);
    }
}
