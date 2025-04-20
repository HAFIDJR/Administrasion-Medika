<?php

namespace App\Livewire\Dokter;

use App\Livewire\Forms\PeriksaPasien;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Pasien;
use Livewire\Attributes\On;
use Livewire\Component;

class EditPeriksaPasien extends Component
{
    public Pasien $pasien;
    public PeriksaPasien $form;
    public $obat;
    public $stockObat = [];
    public $obat_id;
    public $jumlah;
    public $detailPeriksa;
    public $total_harga = 0;

    public function mount(Pasien $pasien)
    {
        $this->detailPeriksa = $pasien->detailPeriksa;
        foreach ($this->detailPeriksa as $key => $value) {
            $this->total_harga += $value->obat->harga * $value->jumlah;

        }
        $this->obat = Obat::all();
        $this->form->setPasien($pasien);
        $this->form->total = $this->total_harga;
    }

    public function updatedObatId()
    {
        $this->stockObat = Obat::find($this->obat_id)->satuan;
    }

    public function changeStorageObat($idDetailPeriksa, $operator)
    {
        $detailPeriksa = DetailPeriksa::find($idDetailPeriksa);
        $obat = Obat::find($detailPeriksa->obat_id);
        $quantityObat = $detailPeriksa->jumlah;

        if ($operator == '+') {
            $quantityObat += 1;
            $detailPeriksa->jumlah = $quantityObat;
            $obat->satuan -= 1;
            $obat->save();
            $detailPeriksa->save();
        } else {
            $quantityObat -= 1;
            $detailPeriksa->jumlah = $quantityObat;
            $obat->satuan += 1;
            $obat->save();
            $detailPeriksa->save();
        }
        $this->dispatch('update-obat-pasien');
    }
    public function updateObatPasien()
    {

        $obat = Obat::find($this->obat_id);
        if (!$obat || $obat->satuan < $this->jumlah) {
            $namaObat = $obat ? $obat->nm_obat : 'Unknown';
            $this->addError('obat_id', 'Stok tidak mencukupi untuk obat: ' . $namaObat);
            return;
        }

        // Dapatkan Data Detail Periksa
        DetailPeriksa::updateOrCreate(
            ['pasien_id' => $this->pasien->id, 'obat_id' => $this->obat_id], // kriteria pencarian
            [
                'jumlah' => $this->jumlah + (
                    DetailPeriksa::where('pasien_id', $this->pasien->id)
                        ->where('obat_id', $this->obat_id)
                        ->value('jumlah') ?? 0
                )
            ] // data untuk diupdate atau dibuat
        );

        $obat->satuan -= $this->jumlah;
        $obat->save();
        $this->dispatch('update-obat-pasien');
        session()->flash('success', 'Data Pemeriksaan Berhasil Diperbarui!');
    }

    #[On('update-obat-pasien')]
    public function refreshData()
    {
        $this->detailPeriksa = $this->pasien->detailPeriksa;
        $this->total_harga = 0;
        foreach ($this->detailPeriksa as $key => $value) {
            $this->total_harga += $value->obat->harga * $value->jumlah;

        }
        $this->form->total = $this->total_harga;

    }
    public function render()
    {
        return view('livewire.dokter.edit-periksa-pasien');
    }
}
