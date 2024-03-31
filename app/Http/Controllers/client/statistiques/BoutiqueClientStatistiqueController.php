<?php

namespace App\Http\Controllers\client\statistiques;

use App\Http\Controllers\Controller;
use App\Models\admin\boutique\Boutique;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\restaurant\Restaurant;
use Illuminate\Http\Request;

class BoutiqueClientStatistiqueController extends Controller
{
    public function index_boutique($id){
        $boutique = Boutique::find($id);
       // dd($boutique);
        $statistiques = Livraison::where('boutique_id', $id)->get();
        return view('clients.statistique.index_boutique', compact('statistiques', 'boutique'));
    }

    public function index_restaurant($id){
        $restaurant = Restaurant::find($id);
        // dd($restaurant);
        $statistiques = Livraison::where('restaurant_id', $id)->get();
        return view('clients.statistique.index_restaurant', compact('statistiques', 'restaurant'));
    }
}
