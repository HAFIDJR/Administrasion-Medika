<?php

namespace App\Livewire\RawatInap;

use App\Models\RawatInap;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditRawatInap extends Component
{
    public RawatInap $rawatInap;

    #[Validate('required')]
    public $id;
    #[Validate('required')]
    public $status;

    public function mount(RawatInap $rawatInap)
    {
        $this->id = $rawatInap->id;
    }
    public function editRawat()
    {

        $this->rawatInap->update(['status' => $this->status]);
        session()->flash('success', 'Rawat Inap Berhasil Diperbarui!');
    }
    public function render()
    {
        return view('livewire.rawat-inap.edit-rawat-inap');
    }
}
