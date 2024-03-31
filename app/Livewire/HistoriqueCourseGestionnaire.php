<?php

namespace App\Livewire;

use App\Models\admin\courses\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HistoriqueCourseGestionnaire extends Component
{
    public function render()
    {
        return view('livewire.historique-course-gestionnaire', ['historiques' => Course::where('gestionnaire_id', Auth::id())->where('status_livraison', 'Payer')->get()]);
    }
}
