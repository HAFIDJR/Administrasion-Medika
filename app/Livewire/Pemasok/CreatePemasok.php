<?php

namespace App\Livewire\Pemasok;

use App\Livewire\Forms\PemasokForm;
use Livewire\Component;

class CreatePemasok extends Component
{
    public PemasokForm $form;

    public function save()
    {
        $this->form->store();
        return redirect()->route('pemasok.index')->with('success','Pemasok berhasil ditambahkan');
    }
    public function render()
    {
        return view('livewire.pemasok.create-pemasok');
    }
}
