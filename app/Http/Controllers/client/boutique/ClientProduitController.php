<?php

namespace App\Http\Controllers\client\boutique;

use App\Http\Controllers\Controller;
use App\Models\admin\boutique\Category_produit;
use Illuminate\Http\Request;
use App\Models\admin\boutique\Produit;
use Illuminate\Support\Facades\DB;

class ClientProduitController extends Controller
{
    public function index_product($id){
        $products = Produit::where('boutique_id', $id)->get();
        //dd($id, $products);
        $categoryproducts = Category_produit::orderBy('name', 'ASC')->get();
        return view('clients.boutique.index', compact('products', 'categoryproducts'));  
    }

    public function cart()
    {
        //dd('ok');
        //$cart_donnees = $request->session()->get('cart');
        //dd($cart_donnees);
        return view('clients.boutique.cart');
    }

    public function search()
    {
        
        
    }

    public function addToCart($id)
    {
        $product = Produit::findOrFail($id);
          
        $cart = session()->get('cart', []);

        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nom_produit" => $product->nom_produit,
                "quantity" => 1,
                "prix" => $product->prix,
                "lienPhoto" => $product->lienPhoto,
                "boutique_id" => $product->boutique_id,
                "category_produit_id" => $product->category_produit_id
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
