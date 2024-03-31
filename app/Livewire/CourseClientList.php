<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\courses\Course;
use Illuminate\Support\Facades\Auth;

class CourseClientList extends Component
{
    public function render()
    {
        return view('livewire.course-client-list', ['courses' => Course::where('user_id', Auth::user()->id)->get()
    ]);
    }
}
