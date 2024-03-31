<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\notifications\Notification;

class MessageClientComponent extends Component
{
    public function render()
    {
        return view('livewire.message-client-component', ['notifications' => Notification::OrderBy('id', 'desc')->where('status', 'non lu')->where('type_d_acteur', 'Client')->where('user_receive_id', Auth::id())->limit(5)->get()]);
    }
}
