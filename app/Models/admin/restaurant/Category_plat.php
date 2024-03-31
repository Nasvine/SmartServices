<?php

namespace App\Models\admin\restaurant;

use App\Models\admin\restaurant\Plat;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\restaurant\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restaurant_id',
   ];

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class, 'restaurant_id');
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }

    
}
