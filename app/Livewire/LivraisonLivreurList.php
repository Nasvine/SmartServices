<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\livraisons\Livraison;

class LivraisonLivreurList extends Component
{
    public function render()
    {
        return view('livewire.livraison-livreur-list', ['livraisons' => Livraison::OrderBy('created_at', 'desc')->get()]);
    }
}
