<?php

namespace App\Http\Controllers\gestionnaire\courses;

use Carbon\Carbon;
use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\courses\Course;
use App\Services\NotificationCourse;
use Illuminate\Support\Facades\Auth;
use App\Events\NotificationEventLivreur;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\NotificationLivraisonCourse;


class CourseGestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gestionnaires.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function confirmation_vue($id)
    {
        $course = Course::find($id);
        return view('gestionnaires.courses.confirm_course', compact('course'));
    }

    public function confirm_course(Request $request, $id)
    {
        $currentDateTime = Carbon::now();
        
        $newDateTime = Carbon::now()->addHour()->format('H:m');
       // dd($newDateTime);
        
        $course = Course::find($id);
        if($request->prix == "500"){

            $tab_course = array(
                'status_livraison' =>  "Valider",
                'gestionnaire_id' =>  Auth::id(),
                'heure_de_confirmation' =>  Carbon::now()->addHour()->format('H:m'),
            );

            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Courses',
                'status'               => 'non lu',
                'course_id'            => $course->id,
                'message'              => "Vous avez une nouvelle course à accepter ",
            );
            
            $notification_message = new NotificationLivraisonCourse; 
            $notification_message->notification($validateData);
            event(new NotificationEventLivreur($validateData));

            Course::where('id', $id)->update($tab_course);
            return to_route('course.gestionnaire.index'); 

        }else{

            $tab_course = array(
                'prix'             =>  $request->prix,
                'status_livraison' =>  "Valider",
                'gestionnaire_id' =>  Auth::id(),
                'heure_de_confirmation' =>  Carbon::now()->addHour()->format('H:m'),
            );

            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Courses',
                'status'               => 'non lu',
                'course_id'            => $course->id,
                'message'              => "Vous avez une nouvelle Livraison à accepter ",
            );
            
            $notification_message = new NotificationLivraisonCourse; 
            $notification_message->notification($validateData);
            event(new NotificationEventLivreur($validateData));

            Course::where('id', $id)->update($tab_course);
            return to_route('course.gestionnaire.index'); 
        }

    }

    public function rejeter_course(Request $request, $id)
    {
        $tab_course = array(
            'status_livraison' =>  "Rejeter",
            );

        Course::where('id', $id)->update($tab_course);
        return redirect()->back()->with('success', 'Course rejectée avec succès !!!'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        $course = Course::find($id);
        return view('gestionnaires.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        
        //dd($course, $request->all());
        $validation = $request->validate([
            'titre'                => 'required',
            'adresse_depart'       => 'required',
            'adresse_livraison'    => 'required',
           // 'date_de_livraison'    => 'required',
            //'numero_client'        => 'required',
            'description'          => 'required'
        ]);
        
        $tab_course = array(
            'titre'                =>  $validation['titre'],
            'adresse_depart'       =>  $validation['adresse_depart'],
            'adresse_livraison'    =>  $validation['adresse_livraison'],
           // 'date_de_livraison'    =>  $validation['date_de_livraison'],
            //'numero_client'        =>  $validation['numero_client'],
            'description'          =>  $validation['description'],
            'user_id'              =>  Auth::user()->id,
        );

        //dd($request->all(), $validation, $tab_course, Auth::user()->profile->first_name);
        Course::whereId($id)->update($tab_course);
        $log = array(
            'subject' => "Modification d'une course par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Modification', 'Course modifiée avec succès.');
        return to_route('course.gestionnaire.index')->with('success', 'Course modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $course = Course::find($id);
        Course::whereId($id)->delete();
        $log = array(
            'subject' => "Suppression d'une course par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Suppression', 'Course supprimée avec succès.');
        return redirect()->back();
    }
}
