<?php

namespace App\Http\Controllers\client\boutique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\boutique\Boutique;

class ClientBoutiqueController extends Controller
{
    public function index(Request $request){
        if($request->name){
             
            $boutiques = Boutique::where('nom_boutique', 'LIKE', '%'.$request->name.'%')->get();
            return view('clients.list.boutique.index', compact('boutiques'));
        }elseif($request->ville){
            $boutiques = Boutique::where('ville', 'LIKE', '%'.$request->ville.'%')->get();
            return view('clients.list.boutique.index', compact('boutiques'));
        }else{
            $boutiques = Boutique::all();
            return view('clients.list.boutique.index', compact('boutiques'));
        }
    }
}
