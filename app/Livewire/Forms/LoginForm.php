<?php

namespace App\Livewire\Forms;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email|max:255')]
    public $email = '';

    #[Validate('required|string|min:8')]
    public $password = '';

    public $remember_me = false;
}
