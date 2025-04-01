<?php

namespace App\Livewire\Pemasok;

use App\Models\Pemasok;
use Livewire\Component;

class PemasokIndex extends Component
{

    public $pemasok;

    public function mount()
    {
        $this->pemasok = Pemasok::all();
    }

    public function deletePemasok($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();


        session()->flash('success', 'Data berhasil dihapus.');

        $this->redirectRoute('pemasok.index');
    }

    public function render()
    {
        return view('livewire.pemasok.pemasok-index');
    }
}
