<?php

namespace App\Livewire\Forms;

use App\Models\Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransaksiMasukForm extends Form
{
    #[Validate('required')]
    public $no_trans;

    public $tgl = '';

    public $pasien_id = '';

    public $nm_pasien = '';

}
