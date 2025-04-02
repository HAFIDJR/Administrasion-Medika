<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    public $user;

    public function mount()
    {
        $this->user = User::all();
    }
    public function render()
    {
        return view('livewire.user.user-index');
    }
}
