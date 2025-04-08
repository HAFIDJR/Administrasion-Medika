<?php

namespace App\Livewire\Forms;

use App\Models\DetailMasuk;
use App\Models\DetailTransaksi;
use App\Models\Pasien;
use App\Models\TransaksiMasuk;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransaksiMasukForm extends Form
{
    #[Validate('required|string|max:255')]
    public $no_trans;

    #[Validate('required|date')]
    public $tgl = '';

    #[Validate('required|exists:pasien,id')]
    public $pasien_id = '';

    #[Validate('required')]
    public $nm_pasien = '';

    #[Validate('required|string|max:255')]
    public $keterangan = '';

    #[Validate('required')]
    public $keterangan_dosis = '';

    #[Validate('required|numeric|min:0')]
    public $harga_periksa = '';

    #[Validate('required|numeric|min:0')]
    public $total = 0;

    public function store()
    {
        $this->validate();
        $transaksi = TransaksiMasuk::create($this->all());
        DetailMasuk::create(['transaksi_masuk_id' => $transaksi->id]);
        DetailTransaksi::create([
            'transaksi_masuk_id' => $transaksi->id,
            'total' => $this->total
        ]);
    }

}
