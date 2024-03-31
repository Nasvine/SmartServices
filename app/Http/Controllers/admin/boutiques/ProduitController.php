<?php

namespace App\Http\Controllers\admin\boutiques;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\boutique\Produit;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\boutique\Category_produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_category_produit($id, $id_boutique){
        $id_boutique = $id_boutique;
        $produits = Produit::where('category_produit_id', $id)->get();
        $category_produit = Category_produit::find($id);
        $category_produit_name = $category_produit->name;
        $category_produit_id = $category_produit->id;
        #dd($id, $category_produit_name);
        $category_produits = Category_produit::all();
        return view('admin.boutiques.produit.index', compact('category_produits', 'produits', 'category_produit_name', 'category_produit_id', 'id_boutique'));   
    }

    public function index()
    {
        /* $produits = Produit::all();
        $category_produits = Category_produit::all(); */
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nom_produit"         => "required",
            "description"         => "required",
            "prix"                => "required",
            "category_produit_id" => "required",
            "photo"               => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:20482589",
        ]);
        
        
        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_produit'].'_'.$validation['category_produit_id'].'.'.$extension;
            $request->photo->move(public_path('boutiques/produits/images'), $image_photo);
            
            #nom_produit du boutique
            $query = Category_produit::find($validation['category_produit_id']);
            $boutique_id = $request->input('id_boutique');

            

           
            
            $tab_produits = array(
                'nom_produit'          =>  $validation['nom_produit'],
                'description'          =>  $validation['description'],
                'prix'                 =>  $validation['prix'],
                'category_produit_id'  =>  (int)$validation['category_produit_id'],
                'boutique_id'          =>  $boutique_id,
                'lienPhoto'            =>  $image_photo,
            );
            #dd($request->all(), $validation, $tab_produits);
            
        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? ""  : $request->file('photo');
            
            #nom_produit du boutique
            $query = Category_produit::find($validation['category_produit_id']);
            $boutique_id = $request->input('id_boutique');

            
            $tab_produits = array(
                'nom_produit'          =>  $validation['nom_produit'],
                'description'          =>  $validation['description'],
                'prix'                 =>  $validation['prix'],
                'category_produit_id'  =>  (int)$validation['category_produit_id'],
                'boutique_id'          =>  $boutique_id,
                'lienPhoto'                =>  $image_photo,
            );
        }
        
        #dd($request->all(), $validation, $boutique_id, $tab_produits);
        $produits = Produit::create($tab_produits);
        
            //dd($user->id);
            
            //dd($request->all(), $validation, $tab_boutique);
            $log = array(
                'subject' => "Créaction d'un produit "." ".$validation['nom_produit']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'agent' => $request->header('user-agent'),
                'user_id' => auth()->check() ? auth()->user()->id : 1,
            );

            $activity_user = new Log();
            $activity_user->logactivity($log);

            Alert::success('Insection', 'produit créé avec succès.');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::find($id);
        $validation = $request->validate([
            "nom_produit"         => "required",
            "description"         => "required",
            "prix"                => "required",
            "category_produit_id" => "required",
            "photo"               => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:20482589",
        ]);
        
        
        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_produit'].'_'.$validation['category_produit_id'].'.'.$extension;
            $request->photo->move(public_path('boutiques/produits/images'), $image_photo);
            
            #nom_produit du boutique
            $query = Category_produit::find($validation['category_produit_id']);

            $boutique_id = $request->input('id_boutique');

            
            $tab_produits = array(
                'nom_produit'          =>  $validation['nom_produit'],
                'description'          =>  $validation['description'],
                'prix'                 =>  $validation['prix'],
                'category_produit_id'  =>  (int)$validation['category_produit_id'],
                'boutique_id'          =>  $boutique_id,
                'lienPhoto'                =>  $image_photo,
            );
            
        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? $produit->photo : "";
            
            #nom_produit du boutique
            $query = Category_produit::find($validation['category_produit_id']);
            $boutique_id = $request->input('id_boutique');
            
            $tab_produits = array(
                'nom_produit'          =>  $validation['nom_produit'],
                'description'          =>  $validation['description'],
                'prix'                 =>  $validation['prix'],
                'category_produit_id'  =>  (int)$validation['category_produit_id'],
                'boutique_id'          =>  $boutique_id,
                //'lienPhoto'            =>  $image_photo,
            );

            # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }
        
            #dd($produit, $validation, $query, $id);
            $produit->update($tab_produits);
            
            //dd($user->id);
            
            //dd($request->all(), $validation, $tab_boutique);
            $log = array(
                'subject' => "Modification des informations du produit "." ".$validation['nom_produit']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'agent' => $request->header('user-agent'),
                'user_id' => auth()->check() ? auth()->user()->id : 1,
            );

            $activity_user = new Log();
            $activity_user->logactivity($log);

            Alert::success('Modification', 'Information sur le produit modifié avec succès.');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $produit = Produit::find($id);
        $user = Auth::user();
        $log = array(
            'subject' => "Suppression du produit"."  ".$produit->nom_produit." par "."  ".$user->profile->first_name." ".$user->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($log);

        $activity_user = new Log();
        $activity_user->logactivity($log);
        
        Produit::find($id)->delete();
        Alert::success('Suppression', 'Produit supprimé avec succès.');
        return redirect()->back();
    }
}
