<?php

namespace App\Http\Controllers\admin\boutiques;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\boutique\Boutique;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\boutique\Category_produit;

class CategoryProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_produits = Category_produit::all();
        $boutiques = Boutique::all();
        return view('admin.boutiques.categoryproduit.index', compact('category_produits', 'boutiques'));
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

        #dd($request->all());
        $validation = $request->validate([
            "name"         => "required",
           # "id_boutique"  => "required",
        ]);

        

        $tab_category_produit = array(
            'name'           =>  $validation['name'],
           # 'boutique_id'    =>  $validation['id_boutique'],
        );

        #dd($request->all(), $validation, $tab_category_produit);

        $category_produits = Category_produit::create($tab_category_produit);

        $log = array(
            'subject' => "Créaction de la catégorie de produit"." ".$validation['name']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

       $activity_user = new Log();
       $activity_user->logactivity($log);

        Alert::success('Insection', 'Catégorie de produit créée avec succès.');
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
        $category_produit = Category_produit::find($id);

        $validation = $request->validate([
            "name"         => "required",
           # "id_boutique"  => "required",
        ]);

        

        $tab_category_produit = array(
            'name'           =>  $validation['name'],
           # 'boutique_id'    =>  $validation['id_boutique'],
        );

        $category_produits = Category_produit::whereId($id)->update($tab_category_produit);

        $log = array(
            'subject' => "Modification de la catégories de produit"." ".$validation['name']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

       $activity_user = new Log();
       $activity_user->logactivity($log);

        Alert::success('Modification', 'Catégorie de produit modifiée avec succès.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $category_produit = Category_produit::find($id);
        $log = array(
            'subject' => "Suppression de la catégories de produit"." ".$category_produit->name." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($log);

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Category_produit::find($id)->delete();
       Alert::success('Suppression', 'Catégorie de produit supprimée avec succès.');
       return redirect()->back();
    }
}
