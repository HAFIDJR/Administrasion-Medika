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

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'Data berhasil dihapus.');

        $this->redirectRoute('user.index');
    }
    public function render()
    {
        return view('livewire.user.user-index');
    }
}
