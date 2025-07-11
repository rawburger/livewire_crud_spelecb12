<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{

    public function authenticate()
    {
       $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

    
        return redirect()->route('livewire.login'); 
    }

    public function render()
    {
        return view('livewire.login');
    }


}
