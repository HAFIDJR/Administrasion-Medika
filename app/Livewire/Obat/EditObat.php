<?php

namespace App\Livewire\Obat;

use App\Livewire\Forms\ObatForm;
use App\Models\Obat;
use Livewire\Component;

class EditObat extends Component
{
    public Obat $obat;
    public ObatForm $form;

    public function mount(Obat $obat)
    {
        $this->form->setObat($obat);
    }

    public function editObat()
    {
        $this->form->update();
        session()->flash('success', 'Data Obat Berhasil Diperbarui!');
    }

    public function render()
    {
        return view('livewire.obat.edit-obat');
    }
}
