<?php

namespace App\Livewire\Pasien;

use App\Models\Pasien;
use Livewire\Component;

class PasienIndex extends Component
{
    public $pasien;

    public function deletePasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        $this->redirectRoute('pasien.index');
    }
    public function mount()
    {
        $this->pasien = Pasien::all();
    }
    public function render()
    {
        return view('livewire.pasien.pasien-index');
    }
}
