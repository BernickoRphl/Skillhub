<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peserta;
use App\Models\Kelas;

class PendaftaranSeeder extends Seeder
{
    public function run()
    {
        $kelasIds = Kelas::pluck('id')->toArray();

        Peserta::all()->each(function ($peserta) use ($kelasIds) {
            // Daftarkan setiap peserta ke 1–2 kelas random
            $peserta->kelas()->attach(
                collect($kelasIds)->random(rand(1, 2))
            );
        });
    }
}
