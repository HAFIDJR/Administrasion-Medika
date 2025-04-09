<?php

namespace App\Livewire\Forms;

use App\Models\Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PeriksaPasien extends Form
{
    public Pasien $pasien;

    #[Validate('required')]
    public $no_antrian = '';

    #[Validate("required|string|min:3")]
    public $nm_pasien = "";

    #[Validate(['required', 'string',])]
    public $umur = "";

    #[Validate("required|string|min:3")]
    public $alamat = "";

    #[Validate([
        "required",
        "string",
    ])]
    public $tensi = "";

    #[Validate("required|string|min:10")]
    public $keluhan = "";

    #[Validate("nullable")]
    public $diagnosa;

    #[Validate("nullable")]
    public $keterangan_dosis;

    #[Validate("required")]
    public $obat_id = '';

    #[Validate("required|integer|min:0")]
    public $jumlah = '';

    #[Validate("nullable")]
    public $total;

    public function setPasien(Pasien $pasien)
    {
        $this->pasien = $pasien;
        $this->nm_pasien = $pasien->nm_pasien;
        $this->umur = $pasien->umur;
        $this->alamat = $pasien->alamat;
        $this->tensi = $pasien->tensi;
        $this->keluhan = $pasien->keluhan;
        $this->diagnosa = $pasien->diagnosa;
        $this->keterangan_dosis = $pasien->keterangan_dosis;
        $this->total = $pasien->total;
    }

    public function updatePemeriksa($obat_id): void
    {
        $this->validate();
        $this->obat_id = $obat_id;
    }
}
