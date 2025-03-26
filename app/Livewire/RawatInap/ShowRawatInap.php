<?php

namespace App\Livewire\RawatInap;
use App\Models\RawatInap;

use Livewire\Component;

class ShowRawatInap extends Component
{
    public $rawatInap;

    public function mount(RawatInap $rawatInap)
    {
        $this->rawatInap = $rawatInap;
    }

    public function render()
    {
        return view('livewire.rawat-inap.show-rawat-inap');
    }
}
