<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;
    public function login()
    {
        $this->validate();
        $result = $this->form->all();
        $credentials = [
            'email' => $result['email'],
            'password' => $result['password']
        ];

        if (Auth::attempt($credentials, $result['remember_me'])) {
            $this->redirectRoute('home');
        } else {
            $this->addError('error', 'Password Atau Email Salah');

        }

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
