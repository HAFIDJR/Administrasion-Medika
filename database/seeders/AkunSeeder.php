<?php

namespace Database\Seeders;

use App\Models\Akun;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akun::create([
            'nm_akun' => 'Kas',
            'jenis' => 'Asset',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Persediaan',
            'jenis' => 'Asset',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Utang Usaha',
            'jenis' => 'Utang',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Pendapatan',
            'jenis' => 'Pendapatan Usaha',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Akun::create([
            'nm_akun' => 'Beban Lain',
            'jenis' => 'Beban',
            'total' => 1000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
