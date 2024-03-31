<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livraisons\Livraison;

class HistoriqueLivraisonLivreur extends Component
{
    public function render()
    {
        return view('livewire.historique-livraison-livreur', ['historiques' => Livraison::/* where('status_livraison', 'Payée')-> */where('livreur_id', Auth::user()->livreur->id)->orderBy('id', 'DESC')->get()]);
    }
}
