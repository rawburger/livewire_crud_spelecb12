<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $username = '';
    public $password = '';
    public $password_confirm = '';

    public function save()
    {
        $validated = $this->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:7',
            'password_confirm' => 'required|confirmed:password'
        ]);

        User::create([
            'username'=>$this->username,
            'password'=>bcrypt($this->password),
        ]);

        session()->flash('message', 'Registration successful! You can now log in.');
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
