<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livraisons\Livraison;

class HistoriqueLivraisonClient extends Component
{
    public function render()
    {
        return view('livewire.historique-livraison-client', ['historiques' => Livraison::where('user_id', Auth::id())->where('status_livraison', 'Payée')->get()]);
    }
}
