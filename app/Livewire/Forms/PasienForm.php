<?php

namespace App\Livewire\Forms;

use App\Models\Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    public ?Pasien $pasien;

    #[Validate('required')]
    public $no_antrian = '';

    #[Validate("required|string|min:3")]
    public $nm_pasien = "";

    #[Validate([
        'required',
        'string',
    ])]
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

    #[Validate("nullable")]
    public $total;

    public function setPasien(Pasien $pasien)
    {
        $this->pasien = $pasien;
        $this->no_antrian = $pasien->no_antrian;
        $this->nm_pasien = $pasien->nm_pasien;
        $this->umur = $pasien->umur;
        $this->alamat = $pasien->alamat;
        $this->tensi = $pasien->tensi;
        $this->keluhan = $pasien->keluhan;
        $this->diagnosa = $pasien->diagnosa;
        $this->keterangan_dosis = $pasien->keterangan_dosis;
        $this->total = $pasien->total;
    }

    public function store()
    {
        $this->validate();
        Pasien::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->pasien->update($this->all());
    }
}
