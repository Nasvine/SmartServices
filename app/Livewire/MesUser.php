<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MesUser extends Component
{
    public function render()
    {
        return view('livewire.mes-user',  [
            //'users' => User::select('id', 'email', 'password')->get(),
            'users' => User::all(),
        ]);
    }
}
