<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\courses\Course;
use Illuminate\Support\Facades\Auth;

class CourseGestionnaireList extends Component
{
    public function render()
    {
        return view('livewire.course-gestionnaire-list', ['courses' => Course::OrderBy('id', 'desc')->get()
    ]);
    }
}
