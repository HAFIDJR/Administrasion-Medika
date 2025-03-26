<?php

namespace App\Livewire\Forms;

use App\Models\RawatInap;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RawatInapForm extends Form
{

    #[Validate('required')]
    public $pengajuan = '';
    #[Validate('required|min:5')]
    public $namaPasien = '';

    #[Validate('required|starts_with:08,+628|digits_between:10,13', message: 'Nomor HP harus dimulai dengan 08 atau +62 dan 
    memiliki 10-13 digit angka')]
    public $noHp = '';

    #[Validate('required|min:5')]
    public $alamat = '';

    #[Validate('required|min:5')]
    public $keluhan = '';

    #[Validate('required|min:5')]
    public $alasan = '';

    #[Validate('required|date')]
    public $tanggalMasuk = '';
    #[Validate(rule: 'nullable|date')]
    public $tanggalKeluar = null;

    #[Validate('nullable|string')]
    public $status = 'belum diverifikasi';

    public function store()
    {
        $this->validate();
        RawatInap::create([
            'pengajuan' => $this->pengajuan,
            'nama_pasien' => $this->namaPasien,
            'no_hp' => (string) $this->noHp,
            'alamat' => $this->alamat,
            'keluhan' => $this->keluhan,
            'alasan' => $this->alasan,
            'tanggal_masuk' => $this->tanggalMasuk,
            'tanggal_keluar' => $this->tanggalKeluar,
            'status' => $this->status,
            'user_id' => Auth::id()
        ]);

    }
}
