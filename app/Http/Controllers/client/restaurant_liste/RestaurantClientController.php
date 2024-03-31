<?php

namespace App\Http\Controllers\client\restaurant_liste;

use App\Services\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\restaurant\Restaurant;
use App\Models\admin\restaurant\Category_plat;

class RestaurantClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset(Auth::user()->profile)){

            $restaurants = Restaurant::all();
            return view('clients.restaurant_liste.index', compact('restaurants'));
        }

        Alert::error('Opération impossible', 'Veuillez mettre à jour votre profile avant de continuer.');
        return redirect()->back()->with('warning', 'Pour mettre à jour votre profile, veuillez déplacer votre curseur sur l\' image par défaut
         se trouvant en haut à droite à côté de l\'icône de panier. Dans le menu qui s\'affiche, Cliquez sur profile.');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_plats = Category_plat::all();
        return view('clients.restaurant_liste.create', compact('category_plats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nom_restaurant"         => "required",
            "adresse_restaurant"     => "required",
            "telephone"            => "required",
            "email"                => "required",
            "ville"                => "required",
            "description"          => "required",
            "photo"                => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "category_plats"          => "required",
        ]);
        
        
        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_restaurant'].'_'.$validation['ville'].'_'. $validation['telephone'].'.'.$extension;
            $request->photo->move(public_path('restaurants/images'), $image_photo);
            
            
            $tab_restaurant = array(
                'nom_restaurant'      =>  $validation['nom_restaurant'],
                'adresse_restaurant'  =>  $validation['adresse_restaurant'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
            );

            $tab_category_plats = array(
                'category_plats' => $validation['category_plats']
           );
            
        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? ""  : $request->file('photo');
            
            $tab_restaurant = array(
                'nom_restaurant'      =>  $validation['nom_restaurant'],
                'adresse_restaurant'  =>  $validation['adresse_restaurant'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
            );

            $tab_category_plats = array(
                'category_plats' => $validation['category_plats']
           );
            
            # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }
        
            $restaurant = Restaurant::create($tab_restaurant);
            $restaurant->category_plats()->attach($tab_category_plats['category_plats']);

            
            //dd($user->id);
            
            //dd($request->all(), $validation, $tab_restaurant);
            $log = array(
                'subject' => "Créaction de la restaurant"." ".$validation['nom_restaurant']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

        $activity_user = new Log();
        $activity_user->logactivity($log);

        Alert::success('Insection', 'Restaurant créé(e) avec succès.');
        return to_route('restaurant_client.client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $category_plats = $restaurant->category_plats;
        #$category_plats = Category_plat::where('restaurant_id', $id)->get();
        #dd($id, $restaurant);
        //dd($user->profile);
        return view('clients.restaurant_liste.show', compact('restaurant', 'category_plats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurant::find($id);
        $category_plats = Category_plat::all();
        return view('clients.restaurant_liste.edit', compact('category_plats', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurant::find($id);
        $validation = $request->validate([
            "nom_restaurant"         => "required",
            "adresse_restaurant"     => "required",
            "telephone"              => "required",
            "email"                  => "required",
            "ville"                  => "required",
            "description"            => "required",
            "photo"                  => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "category_plats"         => "required",
        ]);
        
        //dd($request->all(), $validation);

        
        if(($request->file('photo'))){
           
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['nom_restaurant'].'_'.$validation['ville'].'_'. $validation['telephone'].'.'.$extension;
            $request->photo->move(public_path('restaurants/images'), $image_photo);
            
            
            $tab_restaurant = array(
                'nom_restaurant'      =>  $validation['nom_restaurant'],
                'adresse_restaurant'  =>  $validation['adresse_restaurant'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
            );

            $tab_category_plats = array(
                'category_plats' => $validation['category_plats']
           );

        }else{
            
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? $restaurant->photo  : "";
            
            $tab_restaurant = array(
                'nom_restaurant'      =>  $validation['nom_restaurant'],
                'adresse_restaurant'  =>  $validation['adresse_restaurant'],
                'telephone'           =>  $validation['telephone'],
                'email'               =>  $validation['email'],
                'ville'               =>  $validation['ville'],
                'description'         =>  $validation['description'],
                'photo'               =>  $image_photo,
            );

            $tab_category_plats = array(
                'category_plats' => $validation['category_plats']
           );
            
           # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }

            $restaurant = Restaurant::whereId($id)->update($tab_restaurant);
            $restaurant = Restaurant::Find($id);
            $restaurant->category_plats()->sync($tab_category_plats['category_plats']);


        //dd($user->id);

        $log = array(
            'subject' => "Modification des informations du restaurant ".$restaurant->nom_restaurant." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

        $activity_user = new Log();
        $activity_user->logactivity($log);

        Alert::success('Modification', 'Information du restaurant modifié avec succès.');
        return to_route('restaurant_client.client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $restaurant = Restaurant::find($id);
        
        $image_restaurant = public_path('restaurants/images/'.$restaurant->photo);

        if($image_restaurant){
            File::delete($image_restaurant);
        }

        //dd($restaurant->photo);
        $user = Auth::user();
        $log = array(
            'subject' => "Suppression du restaurant"."  ".$restaurant->nom_restaurant." par "."  ".$user->profile->first_name." ".$user->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($log);

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Restaurant::find($id)->delete();
        Alert::success('Suppression', 'Restaurant supprimé(e) avec succès.');
        return to_route('restaurant_client.client.index');
    }
}
