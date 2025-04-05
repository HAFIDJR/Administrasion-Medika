<?php

namespace App\Livewire\Barang;

use App\Livewire\Forms\BarangForm;
use Livewire\Component;

class CreateBarang extends Component
{

    public BarangForm $form;

    public function save()
    {
        $this->form->store();
        return redirect()->route('barang.index')
            ->with('success', 'barang berhasil ditambahkan');

    }
    public function render()
    {
        return view('livewire.barang.create-barang');
    }
}
