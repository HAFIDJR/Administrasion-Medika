<?php

namespace App\Livewire\Obat;

use App\Livewire\Forms\ObatForm;
use Livewire\Component;

class CreateObat extends Component
{
    public ObatForm $form;

    public function save()
    {
        $this->form->store();
        return redirect()->route('obat.index')
            ->with('success', 'obat berhasil ditambahkan');
    }
    public function render()
    {
        return view('livewire.obat.create-obat');
    }
}
