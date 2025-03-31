<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Models\Pasien;
use Livewire\Component;

class EditPasien extends Component
{
    public Pasien $pasien;

    public PasienForm $form;

    public function mount(Pasien $pasien)
    {
        $this->form->setPasien($pasien);
    }

    public function editPasien()
    {
        $this->form->update();
        session()->flash('success', 'Data Pasien Berhasil Diperbarui!');
    }
    public function render()
    {
        return view('livewire.pasien.edit-pasien');
    }
}
