<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\livraisons\Livraison;

class LivraisonClientList extends Component
{
    

    public function render()
    {
        return view('livewire.livraison-client-list', ['livraisons' => Livraison::OrderBy('id', 'desc')->where('user_id', Auth::id())->get()]);
    }
}
