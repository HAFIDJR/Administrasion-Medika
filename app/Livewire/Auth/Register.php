<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;

class Register extends Component
{

    public RegisterForm $form;

    public function save()
    {
        $this->form->store();

        return redirect()->route('verification.notice');

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
