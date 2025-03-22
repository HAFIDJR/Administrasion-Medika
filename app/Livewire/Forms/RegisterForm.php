<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    //

    #[Validate('required|string|max:255|min:5')]
    public $name = '';

    #[Validate('required|string|email|max:255|unique:users')]
    public $email = '';

    #[Validate('required|string|min:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'pasien'
        ]);

        event(new Registered($user));
        Auth::login($user);
    }

}
