<?php

namespace App\Livewire\Dokter;

use App\Livewire\Forms\PeriksaPasien;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Pasien;
use Livewire\Component;

class EditPeriksaPasien extends Component
{
    public Pasien $pasien;
    public PeriksaPasien $form;
    public $obat;
    public $obat_id;
    public $jumlah;
    public $detailPeriksa;

    public function mount(Pasien $pasien)
    {
        $this->detailPeriksa = $pasien->detailPeriksa;
        $this->obat = Obat::all();
        $this->form->setPasien($pasien);
    }

    public function updatePemeriksa()
    {

        $obat = Obat::find($this->obat_id);
        if (!$obat || $obat->satuan < $this->jumlah) {
            $namaObat = $obat ? $obat->nm_obat : 'Unknown';
            $this->addError('obat_id', 'Stok tidak mencukupi untuk obat: ' . $namaObat);
            return;
        }
        DetailPeriksa::updateOrCreate(['pasien_id' => $this->pasien->id]);
        $this->form->updatePemeriksa($this->obat);
    }

    public function render()
    {
        return view('livewire.dokter.edit-periksa-pasien');
    }
}
