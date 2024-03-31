<?php

namespace App\Http\Controllers\client\courses;

use Carbon\Carbon;
use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Events\course\CourseEvent;
use App\Http\Controllers\Controller;
use App\Models\admin\courses\Course;
use App\Services\NotificationCourse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\Validatormsgs;
use App\Http\Requests\courses\StoreCourseRequest;

class ClientCourseController extends Controller
{
    use Validatormsgs;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            // $courses = Course::where('user_id', Auth::user()->id)->get();
            
            #Course terminer
            $courses_ends = Course::where('user_id', Auth::user()->id)->where('status_livraison', 'Terminer')->get();
    
            return view('clients.courses.index', compact('courses_ends'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function payement_page($id)
    {
        $course = Course::find($id);
        return view('clients.courses.payement_page', compact('course'));
        //dd($course);
    }

    public function callback_course_payment($transactionId, $id)
    {
        $course = Course::find($id);
        Course::whereId($id)->update(['status_livraison'=>'Payer']);
        return to_route('course.client.index')->with('success', 'Payement effectué avec succès.');
        
    }
    

    public function payement_start($id)
    {
        $course = Course::find($id);
        Course::whereId($id)->update(['status_livraison'=>'nonPayer']);
        return to_route('course.client.index')->with('success', 'Payement en cours de confirmation par le livreur');
        //dd($course);
    }

    

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        
        if(Auth::user()->profile == null && Auth::user()->profile->phone == null){
            Alert::error('Impossible d\'ajouter une course ', 'Veuillez mettre à jour le profile de votre compte.');
            return redirect()->back();
        }else{
            
        
        $validation = $request->validated();
        //dd("ok");
        $tab_course = array(
            'titre'                =>  $validation['titre'],
            'adresse_depart'       =>  $validation['adresse_depart'],
            'adresse_livraison'    =>  $validation['adresse_livraison'],
            'description'          =>  $validation['description'],
            'user_id'              =>  Auth::user()->id,
        );

        //dd($request->all(), $validation, $tab_course, Auth::user()->profile->first_name);
        $course = Course::create($tab_course);

        $log = array(
            'subject' => "Créaction d'une course par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);



        #Notification vers le gestionnaire de commande

        $validateData = array(
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'type_de_notification' => 'Courses',
            'status' => 'non lu',
            'message'=>"Vous avez une nouvelle course de Mr/Mlle  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
        );
        
        #dd($course->id);
        $notification_message = new NotificationCourse; 
        $notification_message->notification($validateData);
        
        event(new CourseEvent($validateData));

        Alert::success('Insection', 'Course crée avec succès.');
        return redirect()->back()->with('success', 'Course crée avec succès.');
       }
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
        return view('clients.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $validation = $request->validate([
            'titre'                => 'required',
            'adresse_depart'       => 'required',
            'adresse_livraison'    => 'required',
            'description'          => 'required'
        ]);
        
        $tab_course = array(
            'titre'                =>  $validation['titre'],
            'adresse_depart'       =>  $validation['adresse_depart'],
            'adresse_livraison'    =>  $validation['adresse_livraison'],
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
        return to_route('course.client.index')->with('success', 'Course modifiée avec succès.');
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

        Logactivity::create($log);
        Alert::success('Suppression', 'Course supprimée avec succès.');
        return redirect()->back();
    }
}
