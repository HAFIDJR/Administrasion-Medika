<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Barang;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $akunKas = Akun::where('nm_akun', 'Kas')->sum('total');
        $akunPen = Akun::where('nm_akun', 'Pendapatan')->sum('total');
        $akunPeng = Akun::where('nm_akun', 'Persediaan')->sum('total');
        $barang = Barang::count();
        $obat = Obat::count();
        $pasien = Pasien::count();

        return view('home', compact('akunKas', 'akunPen', 'akunPeng', 'barang', 'obat', 'pasien'));
    }
}
