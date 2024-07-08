<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Foundation\Auth\User;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public User $user;

    public function mount()
    {
        $user = auth()->user();

        $this->user = User::find(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => '',
        ]);

        if(!isset($this->password)){
            unset($valid['password']);
        }

        $this->user->update($valid);

        $this->reset();
        $this->mount();
    }

   

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
