<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peserta;

class PesertaSeeder extends Seeder
{
    public function run()
    {
        $pesertas = [
            [
                'nama' => 'Rahmat Hidayat',
                'email' => 'rahmat@example.com',
                'telepon' => '081234567890',
                'alamat' => 'Surabaya'
            ],
            [
                'nama' => 'Siti Aisyah',
                'email' => 'aisyah@example.com',
                'telepon' => '082134567891',
                'alamat' => 'Sidoarjo'
            ],
            [
                'nama' => 'Doni Saputra',
                'email' => 'doni@example.com',
                'telepon' => '083134567892',
                'alamat' => 'Gresik'
            ],
            [
                'nama' => 'Melani Putri',
                'email' => 'melani@example.com',
                'telepon' => '081334567893',
                'alamat' => 'Malang'
            ],
        ];

        foreach ($pesertas as $p) {
            Peserta::create($p);
        }
    }
}
