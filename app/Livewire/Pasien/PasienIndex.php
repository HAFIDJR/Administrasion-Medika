<?php

namespace App\Livewire\Pasien;

use App\Models\Pasien;
use Livewire\Component;

class PasienIndex extends Component
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
