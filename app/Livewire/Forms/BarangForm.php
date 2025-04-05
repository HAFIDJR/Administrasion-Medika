<?php

namespace App\Livewire\Forms;

use App\Models\Barang;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BarangForm extends Form
{
    public ?Barang $barang;

    #[Validate("required|string|min:3")]
    public $nm_brg = "";

    #[Validate("required|integer|min:0")]
    public $satuan = "";

    #[Validate("required|integer|min:0")]
    public $harga = "";

    public function setBarang($barang)
    {
        $this->barang = $barang;
        $this->nm_brg = $barang->nm_brg;
        $this->satuan = $barang->satuan;
        $this->harga = $barang->harga;
    }

    public function store()
    {
        $this->validate();
        Barang::create($this->all());
    }

    public function update(){
        $this->validate();
        $this->barang->update($this->all());
    }
}
