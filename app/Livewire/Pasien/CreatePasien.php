<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Models\Pasien;
use Livewire\Component;

class CreatePasien extends Component
{
    public PasienForm $form;
    public $no_antrian;
    public function mount()
    {
        $tanggal = now();
        $this->no_antrian = $tanggal->format("m-Y") . "/" . "ANTRIAN" . "-";

        $no_terakhir = Pasien::where("no_antrian", 'like', $this->no_antrian)
            ->orderBy('no_antrian', 'desc')
            ->first();

        if ($no_terakhir) {
            // Memecah nomor antrian terakhir untuk mengambil angka di akhir
            $last_no = explode('-', $no_terakhir->no_antrian);
            $last_num = intval(end($last_no));

            // Menambahkan 1 pada nomor terakhir dan mengisi dengan angka nol di depan jika perlu
            $this->no_antrian .= str_pad($last_num + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $this->no_antrian .= '01';
        }

    }

    public function save()
    {
        $this->form->store();
    }


    public function render()
    {
        return view('livewire.pasien.create-pasien');
    }
}
