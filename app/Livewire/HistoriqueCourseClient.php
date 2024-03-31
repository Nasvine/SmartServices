<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\courses\Course;
use Illuminate\Support\Facades\Auth;

class HistoriqueCourseClient extends Component
{
    public function render()
    {
        return view('livewire.historique-course-client',  ['historiques' => Course::where('user_id', Auth::id())->where('status_livraison', 'Payer')->get()]);
    }
}
