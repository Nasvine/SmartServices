<?php

namespace App\Http\Controllers\admin\restaurants;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\restaurant\Restaurant;
use App\Models\admin\restaurant\Category_plat;

class CategoryPlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_plats = Category_plat::all();
        $restaurants = Restaurant::all();
        return view('admin.restaurants.categoryplat.index', compact('category_plats', 'restaurants'));
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
            "name"           => "required",
           # "id_restaurant"  => "required",
        ]);

        $tab_category_plat = array(
            'name'           =>  $validation['name'],
           # 'restaurant_id'    =>  $validation['id_restaurant'],
        );

        #dd($request->all(), $validation, $tab_category_plat);

        $category_plats = Category_plat::create($tab_category_plat);

        $log = array(
            'subject' => "Créaction de la catégorie de plat"." ".$validation['name']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

        $activity_user = new Log();
        $activity_user->logactivity($log);

        Alert::success('Insection', 'Catégorie de plat créée avec succès.');
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
        $category_plat = Category_plat::find($id);
        $validation = $request->validate([
            "name"         => "required",
           # "id_restaurant"  => "required",
        ]);

        $tab_category_plat = array(
            'name'           =>  $validation['name'],
           # 'restaurant_id'    =>  $validation['id_restaurant'],
        );

        $category_plats = Category_plat::whereId($id)->update($tab_category_plat);

        $log = array(
            'subject' => "Modification de la catégorie de plat"." ".$validation['name']." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

       $activity_user = new Log();
       $activity_user->logactivity($log);

        Alert::success('Modification', 'Catégorie de plat modifiée avec succès.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $category_plat = Category_plat::find($id);
        $log = array(
            'subject' => "Suppression de la catégories de plat"." ".$category_plat->name." par ".Auth::user()->profile->first_name." ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        #dd($log);

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Category_plat::find($id)->delete();
       Alert::success('Suppression', 'Catégorie de plat supprimée avec succès.');
        return redirect()->back();
    }
}
