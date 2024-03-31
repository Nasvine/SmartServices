<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livraisons\Livraison;

class HistoriqueLivraisonGestionnaire extends Component
{
    public function render()
    {
        return view('livewire.historique-livraison-gestionnaire', ['historiques' => Livraison::where('gestionnaire_id', Auth::id())->where('status_livraison', 'Payée')->get()]);
    }
}
