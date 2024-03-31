<?php

namespace App\Http\Controllers\livreur\livraison;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\course\CourseEvent;
use App\Http\Controllers\Controller;
use App\Services\NotificationCourse;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livreurs\Livreur;
use App\Models\admin\commandes\Commande;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\livraisons\Livraison;

class LivreurLivraisonController extends Controller
{
    public function index()
    {
        return view('livreurs.livraisons.index');        
    }

    public function destroy(Request $request, $id){
        $livraison = Livraison::find($id);
        
        if(!$livraison){
            Alert::error('Suppression', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        Livraison::whereId($id)->delete();
        Alert::success('Suppression', "Livraison supprimée avec succès.");
        return redirect()->back();
    }

    public function payement_confirme($id)
    {
        $livraison = Livraison::find($id);
        //Send Notification to Client
        $validateData = array(
            'user_id'              => Auth::user()->id,
            'type_de_notification' => 'Livraison',
            'status'               => 'non lu',
            'type_d_acteur'        => 'Client',
            'user_receive_id'      => $livraison->user_id,
            'livraison_id'         => $livraison->id,
            'message'              => "Le livreur vient de confirmer votre payement.",
        );
        
        $notification_message = new NotificationCourse(); 
        $notification_message->notification($validateData);
        event(new CourseEvent($validateData));

        Livraison::whereId($id)->update(['status_livraison'=>'Payée', 'mode_de_paiement'=>'Cash']);
        Alert::success('Payement', "Payement confirmer avec succès.");
        return to_route('livraison.livreur.index');
        //dd($course);
    }

    public function accept_livraison($id)
    {
        $livraison = Livraison::find($id); 
        
        # Verify if course existing
        if(!$livraison){
            Alert::error('Insection', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        $commande = Commande::find($livraison->commande_id);
        
        if($commande){
        
            $tab_livraison = array(
                'status_livraison' =>  "en cours de livraison",
                'livreur_id'       =>  Auth::user()->livreur->id,
            );
    
            $tab_commande = array(
                'livreur_id'       =>  Auth::user()->livreur->id,
            );

            $tab_livreur = array(
                'disponibilite' =>  "indisponible",
            );

             //Send Notification to Client
            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Livraison',
                'status'               => 'non lu',
                'type_d_acteur'        => 'Client',
                'user_receive_id'      => $livraison->user_id,
                'livraison_id'         => $livraison->id,
                'message'              => "Votre livraison vient d'être acceptée par un livreur.",
            );
            
            $notification_message = new NotificationCourse(); 
            $notification_message->notification($validateData);
            event(new CourseEvent($validateData));
            
            $livraison = Livraison::whereId($id)->update($tab_livraison);
            $commande->update($tab_commande);
            Livreur::whereId(Auth::user()->livreur->id)->update($tab_livreur);
        }else{
            $tab_livraison = array(
                'status_livraison' =>  "en cours de livraison",
                'livreur_id'       =>  Auth::user()->livreur->id,
            );
            $tab_livreur = array(
                'disponibilite' =>  "indisponible",
            );

             //Send Notification to Client
            $validateData = array(
                'user_id'              => Auth::user()->id,
                'type_de_notification' => 'Livraison',
                'status'               => 'non lu',
                'type_d_acteur'        => 'Client',
                'user_receive_id'      => $livraison->user_id,
                'livraison_id'         => $livraison->id,
                'message'              => "Votre livraison vient d'être acceptée par un livreur.",
            );
            
            $notification_message = new NotificationCourse(); 
            $notification_message->notification($validateData);
            event(new CourseEvent($validateData));

            Livraison::whereId($id)->update($tab_livraison);
            Livreur::whereId(Auth::user()->livreur->id)->update($tab_livreur);

        } 

        Alert::success('Acceptation', 'Livraison acceptée avec succès.');
        return to_route('livraison.livreur.index');
    }

    public function start_livraison($id)
    {
        $livraison = Livraison::find($id); 
        
        # Verify if livraison existing
        if(!$livraison){
            Alert::error('Livraison', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        # if course existing
        #$delivery_person_id = Auth::user()->livreur->id;

        if($livraison->livreur_id != Auth::user()->livreur->id){
            Alert::error('Livraison', "Cette livraison est déjà prise par un autre livreur.");
            return redirect()->back();
        }

        #dd($id, $livraison, $delivery_person_id);
        
        $date = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now(), 'Africa/Porto-Novo');
        $date->setTimezone('+2');
        //dd($date);
        $tab_livraison = array(
            'status_livraison' =>  "Démarrer",
            'heure_de_demarrage' =>  $date
        );

        //Send Notification to Client
        $validateData = array(
            'user_id'              => Auth::user()->id,
            'type_de_notification' => 'Livraison',
            'status'               => 'non lu',
            'type_d_acteur'        => 'Client',
            'user_receive_id'      => $livraison->user_id,
            'livraison_id'         => $livraison->id,
            'message'              => "Le livreur vient de démarrer.",
        );
        
        $notification_message = new NotificationCourse(); 
        $notification_message->notification($validateData);
        event(new CourseEvent($validateData));

        Livraison::whereId($id)->update($tab_livraison);
        Alert::success('Démarrage', 'Démarrage de la Livraison avec succès.');
        return to_route('livraison.livreur.index');
    }

    public function end_livraison($id)
    {
        $livraison = Livraison::find($id); 
        
        # Verify if course existing
        if(!$livraison){
            Alert::error('Livraison', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        # if course existing
        //$delivery_person_id = Auth::user()->livreur->id;

        if($livraison->livreur_id != Auth::user()->livreur->id){
            Alert::error('Livraison', "Cette livraison est déjà prise par un autre livreur.");
            return redirect()->back();
        }

        #dd($id, $livraison, $delivery_person_id);
        
        $tab_livraison = array(
            'status_livraison' =>  "Terminer",
        );

        $tab_livreur = array(
            'disponibilite' =>  "disponible",
        );

        //dd($tab_livreur);

         //Send Notification to Client
         $validateData = array(
            'user_id'              => Auth::user()->id,
            'type_de_notification' => 'Livraison',
            'status'               => 'non lu',
            'type_d_acteur'        => 'Client',
            'user_receive_id'      => $livraison->user_id,
            'livraison_id'         => $livraison->id,
            'message'              => "Le livreur vient de terminer la course.",
        );
        
        $notification_message = new NotificationCourse(); 
        $notification_message->notification($validateData);
        event(new CourseEvent($validateData));
        
        Livraison::whereId($id)->update($tab_livraison);
        Livreur::whereId(Auth::user()->livreur->id)->update($tab_livreur);
        Alert::success('Fin de la livraison', 'Livraison terminée avec succès.');
        return to_route('livraison.livreur.index');
    }


}
