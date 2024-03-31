<?php

namespace App\Livewire;

use App\Models\admin\courses\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HistoriqueCourseLivreur extends Component
{
    public function render()
    {
        return view('livewire.historique-course-livreur', ['historiques' => Course::where('status_livraison', 'Payer')->where('livreur_id', Auth::user()->livreur->id)->orderBy('id', 'DESC')->get()]);
    }
}
