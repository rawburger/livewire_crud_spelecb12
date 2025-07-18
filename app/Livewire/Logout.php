<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        $this->redirect(route('livewire.login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
