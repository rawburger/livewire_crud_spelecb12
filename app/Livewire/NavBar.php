<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavBar extends Component
{

    public function logout()
    {
        Auth::logout();

        return $this->redirectRoute('login', navigate: true);
    }
    public function render()
    {
        return view('livewire.nav-bar');
    }
}
