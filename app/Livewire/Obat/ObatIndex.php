<?php

namespace App\Livewire\Obat;

use App\Models\Obat;
use Livewire\Component;

class ObatIndex extends Component
{
    public $obat;

    public function mount()
    {
        $this->obat = Obat::all();
    }

    public function deleteObat($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        $this->redirectRoute('obat.index');
    }

    public function render()
    {
        return view('livewire.obat.obat-index');
    }
}
