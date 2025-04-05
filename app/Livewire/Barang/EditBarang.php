<?php

namespace App\Livewire\Barang;

use App\Livewire\Forms\BarangForm;
use App\Models\Barang;
use Livewire\Component;

class EditBarang extends Component
{
    public Barang $barang;
    public BarangForm $form;

    public function mount(Barang $barang)
    {
        $this->form->setBarang($barang);
    }

    public function editBarang()
    {
        $this->form->update();
        session()->flash('success', 'Data Obat Berhasil Diperbarui!');
    }
    public function render()
    {
        return view('livewire.barang.edit-barang');
    }
}
