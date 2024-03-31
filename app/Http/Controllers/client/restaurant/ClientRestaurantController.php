<?php

namespace App\Http\Controllers\client\restaurant;

use App\Http\Controllers\Controller;
use App\Models\admin\restaurant\Restaurant;
use Illuminate\Http\Request;

class ClientRestaurantController extends Controller
{
    public function index(Request $request){
        if($request->name){
             
            $restaurants = Restaurant::where('nom_restaurant', 'LIKE', '%'.$request->name.'%')->get();
            return view('clients.list.restaurant.index', compact('restaurants'));
        }elseif($request->ville){
            $restaurants = Restaurant::where('ville', 'LIKE', '%'.$request->ville.'%')->get();
            return view('clients.list.restaurant.index', compact('restaurants'));
        }else{
            $restaurants = Restaurant::all();
            return view('clients.list.restaurant.index', compact('restaurants'));
        }
    }
}
