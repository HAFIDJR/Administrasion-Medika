<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeluar extends Model
{
    use HasFactory;

    protected $table = 'detail_keluar';

    protected $fillable = [
        'transaksi_keluar_id',
        'obat_id',
        'barang_id',
    ];
}
