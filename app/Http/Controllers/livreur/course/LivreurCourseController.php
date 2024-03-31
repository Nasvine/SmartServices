<?php

namespace App\Http\Controllers\livreur\course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\courses\Course;
use App\Models\admin\livreurs\Livreur;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LivreurCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses_validers = Course::all();
        return view('livreurs.courses.index', compact('courses_validers'));        
    }

    public function payement_confirme($id)
    {
        $course = Course::find($id);
        Course::whereId($id)->update(['status_livraison'=>'Payer']);
        return to_route('course.livreur.index')->with('success', 'Payement confirmer avec succès.');
        //dd($course);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function accept_course($id)
    {
        $course = Course::find($id); 
        
        # Verify if course existing
        if(!$course){
            Alert::error('Insection', "Cette course n'est pas.");
            return redirect()->back();
        }
        # if course existing

        # Retrieval of the id of the connected delivery person

        $delivery_person_id = Auth::user()->livreur->id;
        
        #dd($id, $course, $delivery_person_id);
        $tab_course = array(
            'status_livraison' =>  "en cours de livraison",
            'livreur_id'       =>  $delivery_person_id,
        );

        $tab_livreur = array(
            'disponibilite' =>  "indisponible",
        );
        //dd($tab_course, $tab_livreur, Auth::user()->livreur->id);

        Course::whereId($id)->update($tab_course);
        Livreur::whereId(Auth::user()->livreur->id)->update($tab_livreur);
        Alert::success('Acceptation', 'Course acceptée avec succès.');
        return to_route('course.livreur.index');
    }

    public function start_course($id)
    {
        $course = Course::find($id); 
        
        # Verify if course existing
        if(!$course){
            Alert::error('Course', "Cette course n'est pas.");
            return redirect()->back();
        }

        # if course existing
        $delivery_person_id = Auth::user()->livreur->id;

        if($course->livreur_id != $delivery_person_id){
            Alert::error('Course', "Cette course est déjà prise par un autre livreur.");
            return redirect()->back();
        }

        #dd($id, $course, $delivery_person_id);
        
        $tab_course = array(
            'status_livraison' =>  "Démarrer",
        );

        Course::whereId($id)->update($tab_course);
        Alert::success('Démarrage', 'Démarrage de la Course avec succès.');
        return to_route('course.livreur.index');
    }

    public function end_course($id)
    {
        $course = Course::find($id); 
        
        # Verify if course existing
        if(!$course){
            Alert::error('Course', "Cette course n'est pas.");
            return redirect()->back();
        }

        # if course existing
        $delivery_person_id = Auth::user()->livreur->id;

        if($course->livreur_id != $delivery_person_id){
            Alert::error('Course', "Cette course est déjà prise par un autre livreur.");
            return redirect()->back();
        }

        #dd($id, $course, $delivery_person_id);
        
        $tab_course = array(
            'status_livraison' =>  "Terminer",
        );
        $tab_livreur = array(
            'disponibilite' =>  "disponible",
        );
        
        
        Course::whereId($id)->update($tab_course);
        Livreur::whereId(Auth::user()->livreur->id)->update($tab_livreur);
        Alert::success('Fin de la course', 'Course terminée avec succès.');
        return to_route('course.livreur.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $course = Course::find($id);
        Course::whereId($id)->delete();
        
        Alert::success('Suppression', 'Course supprimée avec succès.');
        return redirect()->back();
    }
}
