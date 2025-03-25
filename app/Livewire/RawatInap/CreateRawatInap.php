<?php

namespace App\Livewire\RawatInap;

use App\Livewire\Forms\RawatInapForm;
use Livewire\Component;

class CreateRawatInap extends Component
{
    public RawatInapForm $form;

    public function save()
    {
        $this->form->store();
        return $this->redirectRoute('rawat.index');
    }
    public function render()
    {
        return view('livewire.rawat-inap.create-rawat-inap');
    }
}
