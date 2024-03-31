<?php

namespace App\Livewire;

use App\Models\admin\courses\Course;
use Livewire\Component;

class CourseList extends Component
{
    public function render()
    {
        return view('livewire.course-list',
        ['courses' => Course::all()]
     );
    }
}