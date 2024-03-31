<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\notifications\Notification;

class MessageComponent extends Component
{
    public function render()
    {
        return view('livewire.message-component', ['notifications' => Notification::OrderBy('id', 'desc')->where('status', 'non lu')->limit(5)->get()]);
    }
}
