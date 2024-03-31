<?php

namespace App\Http\Controllers;

use App\Models\Logactivity;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Logactivity as ModelsLogactivity;

class GeneralController extends Controller
{
    public function admin(){
        return view('admin.partials.Dashboard');
    }

    public function client(){
        return view('clients.partials.Dashboard')->with('warning', 'Cher Client, avant de poursuivre, veuillez mettre à jour votre profile.Pour le faire, déplacez votre curseur sur l\' image par défaut
        se trouvant en haut à droite à côté de l\'icône de panier. Dans le menu qui s\'affiche, Cliquez sur profile.');
    }

    public function livreur(){
        return view('livreurs.partials.Dashboard');
    }

    public function gestionnaire(){
        return view('gestionnaires.partials.Dashboard');
    }

    public function gestionnaire_dash(){
        return view('gestionnaires.partials.Dashboard');
    }

    public function dash(){
        return view('admin.partials.Dashboard');
    }
    public function logactivity(){
        $logactivities = LogActivity::all();
        return view('admin.log.logactivity', compact('logactivities'));
    }
    public function logactivitydelete($id){
        Logactivity::whereId($id)->delete();
        Alert::success('Suppression', 'Activité(e) supprimée avec succès.');
        return to_route('logactivity');
    }
}
