<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    //
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
    public function store()
    {
        $this->validate();
        dd($this->validate());
    }
}
