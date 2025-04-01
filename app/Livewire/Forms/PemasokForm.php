<?php

namespace App\Livewire\Forms;

use App\Models\Pemasok;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PemasokForm extends Form
{
    public ?Pemasok $pemasok;

    #[Validate('required|string|min:5')]
    public $nm_pemasok = '';

    #[Validate('required|string|min:8')]
    public $alamat = '';

    #[Validate('required|string|min:8')]
    public $keterangan = '';

    public function setPemasok(Pemasok $pemasok)
    {
        $this->pemasok = $pemasok;
        $this->nm_pemasok = $pemasok->nm_pemasok;
        $this->alamat = $pemasok->alamat;
        $this->keterangan = $pemasok->keterangan;
    }

    public function update()
    {
        $this->validate();
        $this->pemasok->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Pemasok::create($this->all());
    }

}
