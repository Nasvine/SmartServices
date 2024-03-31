<?php

namespace App\Http\Controllers\gestionnaire\livraisons;

use App\Events\course\CourseEvent;
use Carbon\Carbon;
use App\Services\Log;
use Illuminate\Http\Request;
use App\Traits\Validatormsgs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\NotificationEventLivreur;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\livraisons\Livraison;
use App\Services\NotificationCourse;
use App\Services\NotificationLivraisonCourse;

class GestionnaireLivraisonController extends Controller
{
    use Validatormsgs;
    
    public function index(){
        return view('gestionnaires.livraisons.index');
    }

    public function destroy(Request $request, $id){
       // dd($id);
        $livraison = Livraison::find($id);
        Livraison::whereId($id)->delete();
        $log = array(
            'subject' => "Suppression d'une livraison par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Suppression', 'Livraison supprimée avec succès.');
        return redirect()->back()->with('success', 'Livraison supprimée avec succès !!!');

    }

    public function rejeter_livraison(Request $request, $id)
    {
        $tab_livraison = array(
            'status_livraison' =>  "Rejeter",
            );

        Livraison::where('id', $id)->update($tab_livraison);
        return redirect()->back()->with('success', 'Livraison rejectée avec succès !!!'); 
    }

    public function index_confirme_livraison($id)
    {
        $livraison = Livraison::find($id);
       // dd($id, $livraison);
        return view('gestionnaires.livraisons.index_confirm_livraison', compact('livraison'));
    }

    public function index_modifier_livraison($id)
    {
        $livraison = Livraison::find($id);
        //dd($id, $livraison);
        return view('gestionnaires.livraisons.index_modifier_livraison', compact('livraison'));
    }

    public function confirme_livraison(Request $request,$id){
      //  dd($id, $request->all());

        $livraison = Livraison::find($id);
        if($request->prix == "700"){
            
            $date = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now(), 'Africa/Porto-Novo');
            $date->setTimezone('+2');
            //dd($date->format("H:m")); 
            $tab_livraison = array(
                'status_livraison' =>  "Confirmer",
                'gestionnaire_id' =>  Auth::id(),
                'heure_de_confirmation' => $date->format("H:m"),
            );

            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Livraison',
                'status'               => 'non lu',
                'type_d_acteur'        => 'Client',
                'user_receive_id'      => $livraison->user_id,
                'livraison_id'         => $livraison->id,
                'message'              => "Votre demande de livraison vient d'être confirmée.",
            );
            
            $notification_message = new NotificationCourse(); 
            $notification_message->notification($validateData);
            event(new CourseEvent($validateData));

            Livraison::where('id', $id)->update($tab_livraison);
            $log = array(
                'subject' => "Confirmation d'une livraison par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'agent' => $request->header('user-agent'),
                'user_id' => auth()->check() ? auth()->user()->id : 1,
            );
    
            $activity_user = new Log();
            $activity_user->logactivity($log);
            return to_route('livraison.gestionnaire.index')->with('success', 'Livraison confirmée avec succès !!!'); 

        }else{
            $date = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now(), 'Africa/Porto-Novo');
            $date->setTimezone('+2');
            //dd($date);
            $tab_livraison = array(
                'prix'             =>  $request->prix,
                'status_livraison' =>  "Confirmer",
                'gestionnaire_id' =>  Auth::id(),
                'heure_de_confirmation' => $date,
            );

            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Livraison',
                'status'               => 'non lu',
                'type_d_acteur'        => 'Client',
                'user_receive_id'      => $livraison->user_id,
                'livraison_id'         => $livraison->id,
                'message'              => "Votre demande de livraison vient d'être confirmée.",
            );
            
            $notification_message = new NotificationCourse(); 
            $notification_message->notification($validateData);
            event(new CourseEvent($validateData));

            Livraison::where('id', $id)->update($tab_livraison);
            // $log = array(
            //     'subject' => "Confirmation d'une livraison par l'utilisateur "."  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name."  avec modification du prix de Livraison qui vaut maintenant: ".$request->prix,
            //     'url' => $request->fullUrl(),
            //     'method' => $request->method(),
            //     'ip' => $request->ip(),
            //     'agent' => $request->header('user-agent'),
            //     'user_id' => auth()->check() ? auth()->user()->id : 1,
            // );
    
            // $activity_user = new Log();
            // $activity_user->logactivity($log);
            return to_route('livraison.gestionnaire.index')->with('success', 'Livraison confirmée avec succès !!!'); 
        }
        
        #Livraison en cours de validation
        $livraisons = Livraison::where('status_livraison', 'en cours de validation')->get();
       

    }


    public function modifier_livraison(Request $request,$id){
        $livraison = Livraison::find($id);
        //dd($id, $livraison);
        

        if(!$livraison){
            Alert::error('Modification', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        $messages = $this->valmsgs();
        $validation = $request->validate([
            'adresse_depart' => 'required',
            'adresse_arrivee' => 'required',
            'type_de_colis' => 'required',
            'messageLivreur' => 'required',
        ], $messages);

        
        $tab_livraison = array(
            'adresse_depart'   => $validation['adresse_depart'],
            'adresse_arrivee'  => $validation['adresse_arrivee'],
            'type_de_colis'    => $validation['type_de_colis'],
            'messageLivreur'   => $validation['messageLivreur'],
        );

        Livraison::whereId($id)->update($tab_livraison);
        Alert::success('Modification', "Livraison modifiée avec succès.");
        return to_route('livraison.gestionnaire.index');
    }
}
