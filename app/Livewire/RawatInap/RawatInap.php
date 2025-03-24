<?php

namespace App\Livewire\RawatInap;

use App\Models\RawatInap as ModelsRawatInap;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RawatInap extends Component
{
    public $rawatInap;

    public function mount()
    {
        $role = Auth::user()->role;

        if ($role === "admin") {
            $this->rawatInap = ModelsRawatInap::all();
        } else {
            $this->rawatInap = ModelsRawatInap::where('user_id', Auth::user()->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.rawat-inap.rawat-inap');
    }
}
