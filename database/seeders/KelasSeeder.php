<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $kelas = [
            [
                'nama_kelas' => 'Desain Grafis',
                'deskripsi' => 'Belajar dasar-dasar desain profesional dengan tools modern.',
                'instruktur' => 'Andi Pratama'
            ],
            [
                'nama_kelas' => 'Pemrograman Dasar',
                'deskripsi' => 'Materi dasar logika dan sintaks pemrograman.',
                'instruktur' => 'Budi Santoso'
            ],
            [
                'nama_kelas' => 'Editing Video',
                'deskripsi' => 'Kelas untuk belajar editing video dari dasar sampai mahir.',
                'instruktur' => 'Rina Maharani'
            ],
            [
                'nama_kelas' => 'Public Speaking',
                'deskripsi' => 'Bangun rasa percaya diri dalam berbicara di depan umum.',
                'instruktur' => 'Dewi Anggraini'
            ],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }
}
