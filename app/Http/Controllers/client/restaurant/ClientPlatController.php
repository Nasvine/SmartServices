<?php

namespace App\Http\Controllers\client\restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\restaurant\Category_plat;
use App\Models\admin\restaurant\Plat;
use App\Models\admin\restaurant\Restaurant;

class ClientPlatController extends Controller
{
    public function index_plat($id){
        $plats = Plat::where('restaurant_id', $id)->get();
        //dd($id, $plats);
        $categoryplats = Category_plat::orderBy('name', 'ASC')->get();
        return view('clients.restaurant.index', compact('plats', 'categoryplats'));

        
    }

    public function cart(Request $request)
    {
        
        $cart_donnees = $request->session()->get('cart');
        // foreach($cart_donnees as $cart_donnee){
        //     $boutique_it_is = $cart_donnee["boutique_id"];
        // }
        // dd($boutique_it_is);
        return view('clients.boutique.cart', compact('cart_donnees'));
    }

    

    public function addToCart($id)
    {
        $product = Plat::findOrFail($id);
          
        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nom_produit" => $product->nom,
                "quantity" => 1,
                "prix" => $product->prix,
                "lienPhoto" => $product->lienPhoto,
                "restaurant_id" => $product->restaurant_id,
                "category_plat_id" => $product->category_plat_id
            ];
            #dd($cart, count($cart));
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
