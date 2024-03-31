<?php

namespace App\Http\Controllers\client\livraisons;

use Carbon\Carbon;
use Kkiapay\Kkiapay;
use Illuminate\Http\Request;
use App\Traits\Validatormsgs;
use App\Events\course\CourseEvent;
use App\Http\Controllers\Controller;
use App\Services\NotificationCourse;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livreurs\Livreur;
use App\Models\admin\boutique\Boutique;
use App\Events\NotificationEventLivreur;
use App\Models\admin\commandes\Commande;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\restaurant\Restaurant;
use App\Models\admin\commandes\LigneCommande;
use App\Services\NotificationLivraisonCourse;

class ClientLivraisonController extends Controller
{
    use Validatormsgs;

    public function index(){
        
        return view('clients.livraisons.index');
    }

    public function index_adress()
    {
        return view('clients.boutique.create');
    }

    public function create(){
        return view('clients.livraisons.create');
    }

    public function edit($id){
        $livraison = Livraison::find($id);
        return view('clients.livraisons.edit', compact('livraison'));
    }

    public function choiseview(){
        return view('clients.livraisons.choiseview');
    }

    public function accepter($id){
        $livraison = Livraison::find($id);

        if(!$livraison){
            Alert::error('Impossible', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        $validateData = array(
            'user_id'              => Auth::user()->id,
            'type_de_notification' => 'Livraison',
            'type_d_acteur'        => 'Gestionnaire',
            'status'               => 'non lu',
            'livraison_id'         => $livraison->id,
            'message'              => "Vous avez une nouvelle Livraison à accepter ",
        );

        $tab_livraison = array(
            'status_livraison' =>  "Valider",
        );
        
        $notification_message = new NotificationLivraisonCourse; 
        $notification_message->notification($validateData);
        event(new NotificationEventLivreur($validateData));

        Livraison::where('id', $id)->update($tab_livraison);
      
        return to_route('livraison.client.index')->with('success', 'Livraison accepté(e) avec succès.');
    }
    public function refuser($id){
        $livraison = Livraison::find($id);

        if(!$livraison){
            Alert::error('Impossible', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        

        $tab_livraison = array(
            'status_livraison' =>  "Rejeter",
        );
        
        Livraison::where('id', $id)->update($tab_livraison);
      
        return to_route('livraison.client.index')->with('success', 'Livraison rejeté(e) avec succès.');
    }

    public function payement_page($id)
    {
        $livraison = Livraison::find($id);
        return view('clients.livraisons.payement_page', compact('livraison'));
        //dd($livraison);
    }

    public function callback_livraison_payment($transactionId, $id)
    {
        $livraison = Livraison::find($id);
        $tab_livreur = array(
            'disponibilite' =>  "disponible",
        );

        

        $validateData = array(
            'user_id'              => Auth::user()->id,
            'type_de_notification' => 'Courses',
            'status'               => 'non lu',
            'livraison_id'         => $livraison->id,
            'message'              => "Vous avez une paiement Momo de Livraison effectué par ".$livraison->user->profile->first_name.' '.$livraison->user->profile->last_name,
        );

        //dd($livraison->user->profile->first_name, $validateData);

        Livraison::whereId($id)->update(['status_livraison'=>'Payée', 'mode_de_paiement'=>'Momo']);
        Livreur::whereId($livraison->livreur_id)->update($tab_livreur);
        $notification_message = new NotificationLivraisonCourse; 
        $notification_message->notification($validateData);
        event(new NotificationEventLivreur($validateData));
        return to_route('livraison.client.index')->with('success', 'Payement effectué avec succès.');
    }

    public function payement_start($id)
    {
        $livraison = Livraison::find($id);
        Livraison::whereId($id)->update(['status_livraison'=>'Non payée']);
        return to_route('livraison.client.index')->with('success', 'Payement en cours de confirmation par le livreur');
        //dd($livraison);
    }


    public function update_livraison_simple(Request $request, $id){
        
        $livraison = Livraison::find($id);
        

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
        return to_route('livraison.client.index');
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

    public function destroy_livraison_bouResto(Request $request, $id){
        $livraison = Livraison::find($id);
        
        if(!$livraison){
            Alert::error('Suppression', "Cette livraison n'est pas disponible.");
            return redirect()->back();
        }

        Livraison::whereId($id)->delete();
        Alert::success('Reprise de la livraison', "Livraison supprimée avec succès.");
        return to_route('livraison.client.choiseview');
    }

    public function store_simple_livraison(Request $request){
        
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
            'user_id'          => Auth::id(),
            'livraison_date'   => Carbon::now()->format('Y-m-d')
        );

        $validateData = array(
            'user_id' => Auth::user()->id,
            'type_de_notification' => 'Livraison',
            'status' => 'non lu',
            'message'=>"Vous avez une nouvelle Livraison de Mr/Mlle  ".Auth::user()->profile->first_name."  ".Auth::user()->profile->last_name,
        );
        
        $notification_message = new NotificationCourse; 
        $notification_message->notification($validateData);
        event(new CourseEvent($validateData));

        Livraison::create($tab_livraison);
        return to_route('livraison.client.index')->with('success', 'Livraison créée avec succès !!!');
        
       // dd($request->all(), $tab_livraison);

    }

    public function store(Request $request){
        
        $validation = $request->validate([
            'adresse_livraison' => 'required',
        ]);

        
        # Vérification de l'endroit ou les commandes ont été passées
        
         $cart_donnees = $request->session()->get('cart');

         if($cart_donnees == null){
            return to_route('livraison.client.index')->with('error', 'Votre panier est vide.');
         }
         //dd($cart_donnees);
         foreach ($cart_donnees as $cart_donnee) {
            //dd($cart_donnee);
            if (isset($cart_donnee['boutique_id'])) {

                // Étape 1 : Création d'un tableau pour regrouper les produits par boutique_id
                $groupedProducts = collect($cart_donnees)->groupBy('boutique_id');

                // Étape 2 : Parcourez les groupes et créez les enregistrements de commande
                foreach ($groupedProducts as $boutiqueId => $products) {

                    // Créez un enregistrement dans la table "commande"
                    $commande = new Commande();
                    $commande->type_de_commande = 'Boutique'; 
                    $commande->status_commande = 'non payer';
                    $commande->montant_commande = $products->sum('prix'); 
                    $commande->user_id = Auth::id(); 
                    //$commande->livreur_id = Auth::id();
                    $commande->save();

                // Étape 3 : Parcourez les produits du groupe et créez les enregistrements dans "lignes_de_commande"

                    foreach ($products as $product) {
                        $ligneDeCommande = new LigneCommande();
                        $ligneDeCommande->commande_id = $commande->id;
                        $ligneDeCommande->quantite = $product['quantity'];
                        $ligneDeCommande->nom_du_produit = $product['nom_produit'];
                        $ligneDeCommande->prix = $product['prix'];
                        $ligneDeCommande->save();
                    }

                    $boutique_name = Boutique::find($boutiqueId);

                    // Étape 4 : Créez une nouvelle livraison associée à la commande

                    $livraison = new Livraison();
                    $livraison->adresse_depart = $boutique_name->nom_boutique; 
                    $livraison->adresse_arrivee = $validation['adresse_livraison'];
                    $livraison->status_livraison = 'en cours de validation';
                    $livraison->prix = 500; 
                    $livraison->commande_id = $commande->id; 
                    $livraison->user_id = Auth::id(); 
                    $livraison->mode_de_paiement = $commande->id;
                    $livraison->boutique_id = $boutiqueId;
                    $livraison->livraison_date = Carbon::now()->format('Y-m-d');
                    $livraison->montant_total = $commande->montant_commande + 500;
                    $livraison->save();
                }

                $request->session()->put('cart');
                
                return to_route('livraison.client.index')->with('success', 'Livraison créée avec succès !!!');
                #dd($groupedProducts);

            } elseif(isset($cart_donnee['restaurant_id'])) {
              
               // dd('ok');

                // Étape 1 : Création d'un tableau pour regrouper les produits par boutique_id

                $groupedProducts = collect($cart_donnees)->groupBy('restaurant_id');

                // Étape 2 : Parcourez les groupes et créez les enregistrements de commande

                foreach ($groupedProducts as $restaurantId => $products) {

                    // Créez un enregistrement dans la table "commande"
                    $commande = new Commande();
                    $commande->type_de_commande = 'Restaurant'; 
                    $commande->status_commande = 'en préparation';
                    $commande->montant_commande = $products->sum('prix'); 
                    $commande->user_id = Auth::id(); 
                    //$commande->livreur_id = Auth::id();
                    $commande->save();

                // Étape 3 : Parcourez les produits du groupe et créez les enregistrements dans "lignes_de_commande"

                    foreach ($products as $product) {
                        $ligneDeCommande = new LigneCommande();
                        $ligneDeCommande->commande_id = $commande->id;
                        $ligneDeCommande->quantite = $product['quantity'];
                        $ligneDeCommande->nom_du_produit = $product['nom_produit'];
                        $ligneDeCommande->prix = $product['prix'];
                        $ligneDeCommande->save();
                    }

                    $restaurant_name = Restaurant::find($restaurantId);

                    // Étape 4 : Créez une nouvelle livraison associée à la commande

                    $livraison = new Livraison();
                    $livraison->adresse_depart = $restaurant_name->nom_restaurant; 
                    $livraison->adresse_arrivee = $validation['adresse_livraison'];
                    $livraison->status_livraison = 'en cours de validation';
                    $livraison->prix = 500; 
                    $livraison->commande_id = $commande->id; 
                    $livraison->user_id = Auth::id(); 
                    $livraison->mode_de_paiement = $commande->id;
                    $livraison->restaurant_id = $restaurantId;
                    $livraison->livraison_date = Carbon::now()->format('Y-m-d');
                    $livraison->montant_total = $commande->montant_commande + 500;
                    $livraison->save();

                }

                $request->session()->put('cart');
                
                return to_route('livraison.client.index')->with('success', 'Livraison créée avec succès !!!');
            }else{
                return to_route('livraison.client.index')->with('error', 'Votre panier est vide.');

            }
        }

    }
}
