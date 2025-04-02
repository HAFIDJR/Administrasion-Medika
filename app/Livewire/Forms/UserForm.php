<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;
    #[Validate('required|string|max:255|min:5')]
    public $name = '';

    #[Validate('required|string|email|max:255')]
    public $email = '';

    #[Validate('string|min:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    #[Validate('required')]
    public $role = '';

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate();
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->role = $this->role;

        if (!empty($this->password)) {
            $this->user->password = bcrypt($this->password);
        }
        $this->user->save();
    }
}
