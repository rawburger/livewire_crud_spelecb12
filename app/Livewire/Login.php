<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username = '';
    public $password = '';

    public function authenticate()
    {
       $validated = $this->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        if(Auth::attempt(['username' => $validated['username'],'password' => $validated['password'],])) {
           session()->regenerate();
           
            $this->redirect(route('livewire.index'), navigate: true); 
        }
    }

    public function render()
    {
        return view('livewire.login');
    }


}
