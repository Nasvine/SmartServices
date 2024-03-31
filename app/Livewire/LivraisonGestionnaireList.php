<?php

namespace App\Livewire;

use App\Models\admin\livraisons\Livraison;
use Livewire\Component;

class LivraisonGestionnaireList extends Component
{
    public function render()
    {
        return view('livewire.livraison-gestionnaire-list', ['livraisons' => Livraison::OrderBy('id', 'desc')->get()]);
    }
}
