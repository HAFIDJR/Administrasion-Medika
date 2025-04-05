<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;

class BarangIndex extends Component
{
    public $barang;
    public function mount()
    {
        $this->barang = Barang::all();
    }
    public function render()
    {
        return view('livewire.barang.barang-index');
    }
}
