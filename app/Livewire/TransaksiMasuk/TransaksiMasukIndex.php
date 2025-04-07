<?php

namespace App\Livewire\TransaksiMasuk;

use App\Models\TransaksiMasuk;
use Livewire\Component;

class TransaksiMasukIndex extends Component
{
    public $transaksi_masuk;

    public function mount()
    {
        $this->transaksi_masuk = TransaksiMasuk::all();
    }
    public function render()
    {
        return view('livewire.transaksi-masuk.transaksi-masuk-index');
    }
}
