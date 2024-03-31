<?php

namespace App\Http\Controllers\inventaires;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\livreurs\Livreur;

class InventaireLivreurController extends Controller
{
    public function index(Request $request){
        
        if($request->day_date && $request->day_date){

            $livreurs = Livreur::all();
            $inventaire_clients = Livraison::where('livraison_date', $request->day_date)->where('livreur_id', $request->livreur_id)->/* with('user:email,role_id')-> */get();
            return view('gestionnaires.inventaire_clients.index', compact('inventaire_clients', 'livreurs'));

        }else{

            $livreurs = Livreur::all();
            $inventaire_clients = Livraison::get();
            return view('gestionnaires.inventaire_clients.index', compact('inventaire_clients', 'livreurs'));

        }
        //  dd($inventaire_clients);

    //  $statistics_delivery_pay_today = Livraison::where('livraison_date', $request->day_date)->where('status_livraison', 'Payée')->sum('prix');
    //  $statistics_delivery_notpay_today = Livraison::where('livraison_date', $request->day_date)->where('status_livraison', 'non payée')->count();
 
     }
}
