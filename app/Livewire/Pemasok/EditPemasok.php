<?php

namespace App\Livewire\Pemasok;

use App\Livewire\Forms\PemasokForm;
use App\Models\Pemasok;
use Livewire\Component;

class EditPemasok extends Component
{
    public Pemasok $pemasok;
    public PemasokForm $form;

    public function mount(Pemasok $pemasok)
    {
        $this->form->setPemasok($pemasok);
    }

    public function editPemasok()
    {
        $this->form->update();
        session()->flash('success', 'Data Pemasok Berhasil Diperbarui!');
    }

    public function render()
    {
        return view('livewire.pemasok.edit-pemasok');
    }
}
