<?php

namespace App\Traits;

trait Validatormsgs{
    public function valmsgs(){
        $message = [
             #Livraison simple validation

             'adresse_depart.required'  => "Entrer une adresse de départ précise." ,
             'titre.required'  => "Entrer un titre de course valide." ,
             'description.required'  => "Donner une description de course valide." ,
             'adresse_arrivee.required'  => "Entrer une adresse d'arrivée précise." ,
             'adresse_livraison.required'  => "Entrer une adresse de livraison précise." ,
             'type_de_colis.required'   => "Selectionner un type de colis valide.",
             'messageLivreur.required'  => "Laisser un message au livreur pour détails concernant la livraison." ,
        ];

        return $message;
    }
}