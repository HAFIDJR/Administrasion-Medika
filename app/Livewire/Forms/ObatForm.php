<?php

namespace App\Livewire\Forms;

use App\Models\Obat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ObatForm extends Form
{

    public ?Obat $obat;

    #[Validate("required|string|min:3")]
    public $nm_obat = "";

    #[Validate("required|integer|min:0")]
    public $satuan = "";

    #[Validate("required|integer|min:0")]
    public $harga = "";

    public function setObat(Obat $obat)
    {
        $this->obat = $obat;
        $this->nm_obat = $obat->nm_obat;
        $this->satuan = $obat->satuan;
        $this->harga = $obat->harga;
    }

    public function store()
    {
        $this->validate();
        Obat::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->obat->update($this->all());
    }
}
