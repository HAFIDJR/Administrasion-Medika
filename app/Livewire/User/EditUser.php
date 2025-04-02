<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public UserForm $form;
    public User $user;
    public function mount(User $user)
    {
        $this->form->setUser($user);
    }

    public function editUser()
    {
        $this->form->update();
        session()->flash('success', 'User Berhasil Diperbarui!');
    }
    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
