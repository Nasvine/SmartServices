<?php

namespace App\Http\Controllers\admin\restaurants;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\restaurant\Plat;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\restaurant\Category_plat;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index_category_plat($id, $id_restaurant){
        $plats = Plat::where('category_plat_id', $id)->get();
        $id_restaurant = $id_restaurant;
        $category_plat = Category_plat::find($id);
        $category_plat_name = $category_plat->name;
        $category_plat_id = $category_plat->id;
        #dd($id, $category_plat_name);
        $category_plats = Category_plat::all();
        return view('admin.restaurants.plat.index', compact('category_plats', 'plats', 'category_plat_name', 'category_plat_id', 'id_restaurant')); 
    } 
    public function index()
    {
        $plats = Plat::all();
        $category_plats = Category_plat::all();
        return view('admin.restaurants.plat.index', compact('category_plats', 'plats'));
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
            "nom"                 => "required",
            "description"         => "required",
            "prix"                => "required",
            "category_plat_id"    => "required",
            "photo"               => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:20482589",
        ]);
        
        
        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom'].'_'.$validation['category_plat_id'].'.'.$extension;
            $request->photo->move(public_path('restaurants/plats/images'), $image_photo);
            
            #nom du restaurant
            $query = Category_plat::find($validation['category_plat_id']);
            $restaurant_id = $request->input('restaurant_id');
            $tab_plats = array(
                'nom'                =>  $validation['nom'],
                'description'        =>  $validation['description'],
                'prix'               =>  $validation['prix'],
                'category_plat_id'   =>  (int)$validation['category_plat_id'],
                'restaurant_id'      =>  $restaurant_id,
                'lienPhoto'              =>  $image_photo,
            );
            #dd($request->all(), $validation, $tab_plats);
            
        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? ""  : $request->file('photo');
            
            #nom du restaurant
            $query = Category_plat::find($validation['category_plat_id']);
            $restaurant_id = $request->input('restaurant_id');
            
            $tab_plats = array(
                'nom'                =>  $validation['nom'],
                'description'        =>  $validation['description'],
                'prix'               =>  $validation['prix'],
                'category_plat_id'   =>  (int)$validation['category_plat_id'],
                'restaurant_id'      =>  $restaurant_id,
                'lienPhoto'              =>  $image_photo,
            );
        }
        
            $plats = Plat::create($tab_plats);
            
            //dd($user->id);
            
            //dd($request->all(), $validation, $tab_restaurant);
            $log = array(
                'subject' => "Créaction d'un plat "." ".$validation['nom']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'agent' => $request->header('user-agent'),
                'user_id' => auth()->check() ? auth()->user()->id : 1,
            );

            $activity_user = new Log();
            $activity_user->logactivity($log);

            Alert::success('Insection', 'Plat créé avec succès.');
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
        $plat = Plat::find($id);
        $validation = $request->validate([
            "nom"               => "required",
            "description"       => "required",
            "prix"              => "required",
            "category_plat_id"  => "required",
            "photo"             => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:20482589",
        ]);
        
        
        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom'].'_'.$validation['category_plat_id'].'.'.$extension;
            $request->photo->move(public_path('restaurants/plats/images'), $image_photo);
            
            #nom du restaurant
            $query = Category_plat::find($validation['category_plat_id']);
            $restaurant_id = $request->input('restaurant_id');

            $tab_plats = array(
                'nom'                =>  $validation['nom'],
                'description'        =>  $validation['description'],
                'prix'               =>  $validation['prix'],
                'category_plat_id'   =>  (int)$validation['category_plat_id'],
                'restaurant_id'      =>  $restaurant_id,
                'lienPhoto'              =>  $image_photo,
            );
            
        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? $plat->photo  : "";
            
            #nom du restaurant
            $query = Category_plat::find($validation['category_plat_id']);
            $restaurant_id = $query->restaurant_id;

            $tab_plats = array(
                'nom'                =>  $validation['nom'],
                'description'        =>  $validation['description'],
                'prix'               =>  $validation['prix'],
                'category_plat_id'   =>  (int)$validation['category_plat_id'],
                'restaurant_id'      =>  $restaurant_id,
                'lienPhoto'              =>  $image_photo,
            );
            # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }
        
            $plats = Plat::whereId($id)->update($tab_plats);
            
            //dd($user->id);
            
            //dd($request->all(), $validation, $tab_restaurant);
            $log = array(
                'subject' => "Modification des informations du plat "." ".$validation['nom']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'agent' => $request->header('user-agent'),
                'user_id' => auth()->check() ? auth()->user()->id : 1,
            );

            $activity_user = new Log();
            $activity_user->logactivity($log);

            Alert::success('Modification', 'Information sur le Plat modifié avec succès.');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $plat = Plat::find($id);
        $user = Auth::user();
        $log = array(
            'subject' => "Suppression du plat"."  ".$plat->nom." par "."  ".$user->profile->first_name." ".$user->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($log);

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Plat::find($id)->delete();
        Alert::success('Suppression', 'Plat supprimé avec succès.');
            return redirect()->back();
    }
}
