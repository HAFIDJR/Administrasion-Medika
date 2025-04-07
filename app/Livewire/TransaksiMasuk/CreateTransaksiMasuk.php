<?php

namespace App\Livewire\TransaksiMasuk;

use App\Livewire\Forms\TransaksiMasukForm;
use App\Models\Pasien;
use App\Models\TransaksiMasuk;
use Livewire\Component;

class CreateTransaksiMasuk extends Component
{
    public $pasien = [];
    public TransaksiMasukForm $form;
    public function generateNoTransaksi()
    {
        $latest = TransaksiMasuk::latest()->first();
        $latest_no = $latest ? intval(substr($latest->no_trans, -4)) : 0;
        $next_no = str_pad($latest_no + 1, 4, '0', STR_PAD_LEFT);
        return 'TRX-' . $next_no;
    }

    public function mount()
    {
        $this->form->no_trans = $this->generateNoTransaksi();
    }

    public function updated($property, $value)
    {
        if ($property == 'form.nm_pasien') {
            if (!empty(trim($value))) {
                $this->pasien = Pasien::where('nm_pasien', 'like', "%{$value}%")
                    ->limit(10) // Batasi hasil
                    ->get();
            } else {
                $this->pasien = []; // Kosongkan jika input kosong
            }
        }
    }

    public function selectPasien($id)
    {
        $pasien = Pasien::find($id);
        $this->form->pasien_id = $pasien->id;
        $this->form->nm_pasien = $pasien->nm_pasien;
        $this->pasien = [];
    }

    public function render()
    {
        return view('livewire.transaksi-masuk.create-transaksi-masuk');
    }
}
