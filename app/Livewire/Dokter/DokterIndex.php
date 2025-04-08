<?php

namespace App\Livewire\Dokter;

use App\Models\Pasien;
use Livewire\Component;

class DokterIndex extends Component
{
    public $pasien;
    public function mount()
    {
        $this->pasien = Pasien::all();
    }
    public function render()
    {
        return view('livewire.pasien.pasien-index');
    }
}
