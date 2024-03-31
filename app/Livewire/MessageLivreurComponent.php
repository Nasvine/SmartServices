<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\admin\notifications\NotificationLivreur;

class MessageLivreurComponent extends Component
{
    public function render()
    {
        return view('livewire.message-livreur-component', ['notifications' => NotificationLivreur::OrderBy('id', 'desc')->where('status', 'non lu')->limit(5)->get()]);
    }
}
