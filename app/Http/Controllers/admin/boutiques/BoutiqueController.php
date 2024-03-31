<?php

namespace App\Http\Controllers\admin\boutiques;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\admin\boutique\Boutique;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\boutique\Category_produit;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boutiques = Boutique::all();
        return view('admin.boutiques.index', compact('boutiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_produits = Category_produit::all();
        return view('admin.boutiques.create', compact('category_produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nom_boutique"         => "required",
            "adresse_boutique"     => "required",
            "telephone"            => "required",
            "email"                => "required",
            "ville"                => "required",
            "description"          => "required",
            "photo"                => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "category_produits"    => "required",
        ]);
        
        //dd($request->all(), $validation);

        
        if(($request->file('photo'))){
           
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_boutique'].'_'.$validation['ville'].'_'. $validation['telephone'].'.'.$extension;
            $request->photo->move(public_path('boutiques/images'), $image_photo);
            
            
            $tab_boutique = array(
                'nom_boutique'        =>  $validation['nom_boutique'],
                'adresse_boutique'    =>  $validation['adresse_boutique'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
                'user_id'               =>  Auth::id(),
            );

            $tab_category_produits = array(
                'category_produits' => $validation['category_produits']
           );

        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? ""  : $request->file('photo');
            
            $tab_boutique = array(
                'nom_boutique'        =>  $validation['nom_boutique'],
                'adresse_boutique'    =>  $validation['adresse_boutique'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
                'user_id'             =>  Auth::id(),
            );

            $tab_category_produits = array(
                'category_produits' => $validation['category_produits']
           );
            
           # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }

            $boutique = Boutique::create($tab_boutique);
            $boutique->category_produits()->attach($tab_category_produits['category_produits']);

        //dd($user->id);

        $log = array(
            'subject' => "Créaction de la boutique"." ".$validation['nom_boutique']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

       $activity_user = new Log();
       $activity_user->logactivity($log);

        Alert::success('Insection', 'Boutique créé(e) avec succès.');
        return to_route('boutique.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $boutique = Boutique::find($id);

        $category_produits = $boutique->category_produits;
        
       // $category_produits = Category_produit::where('boutique_id', $id)->get();
        //dd($user->profile);
        return view('admin.boutiques.show', compact('boutique', 'category_produits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $boutique = Boutique::find($id);
        $category_produits = Category_produit::all();
        return view('admin.boutiques.edit', compact('category_produits', 'boutique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $boutique = Boutique::find($id);
        $validation = $request->validate([
            "nom_boutique"         => "required",
            "adresse_boutique"     => "required",
            "telephone"            => "required",
            "email"                => "required",
            "ville"                => "required",
            "description"          => "required",
            "photo"                => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "category_produits"    => "required",
        ]);
        
        //dd($request->all(), $validation);

        
        if(($request->file('photo'))){
           
            #Image Photo
           
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_boutique'].'_'.$validation['ville'].'_'. $validation['telephone'].'.'.$extension;
            $request->photo->move(public_path('boutiques/images'), $image_photo);
            
            
            $tab_boutique = array(
                'nom_boutique'        =>  $validation['nom_boutique'],
                'adresse_boutique'    =>  $validation['adresse_boutique'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
                'user_id'             =>  Auth::id(),
            );

            $tab_category_produits = array(
                'category_produits' => $validation['category_produits']
            );

        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? $boutique->photo : "";
            
            $tab_boutique = array(
                'nom_boutique'        =>  $validation['nom_boutique'],
                'adresse_boutique'    =>  $validation['adresse_boutique'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
                'user_id'             =>  Auth::id(),
            );

            $tab_category_produits = array(
                'category_produits' => $validation['category_produits']
           );
            
           # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }

            $boutique = Boutique::whereId($id)->update($tab_boutique);
            $boutique = Boutique::Find($id);
            $boutique->category_produits()->sync($tab_category_produits['category_produits']);


        //dd($user->id);

        $log = array(
            'subject' => "Créaction de la boutique"." ".$validation['nom_boutique']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->first_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

        $activity_user = new Log();
        $activity_user->logactivity($log);

        Alert::success('Modification', 'Boutique modifié(e) avec succès.');
        return to_route('boutique.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $boutique = Boutique::find($id);

        $image_boutique = public_path('boutiques/images/'.$boutique->photo);

        if($image_boutique){
            File::delete($image_boutique);
        }
    
        $user = Auth::user();
        $log = array(
            'subject' => "Suppression de la boutique  ".$boutique->nom_boutique." par "." ".$user->profile->first_name." ".$user->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($boutique);
        #dd($log);

       $activity_user = new Log();
       $activity_user->logactivity($log);

       Boutique::whereId($id)->delete();
       Alert::success('Suppression', 'Boutique supprimé(e) avec succès.');
       return to_route('boutique.admin.index');
    }
}
