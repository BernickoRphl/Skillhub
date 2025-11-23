<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'deskripsi',
        'instruktur',
    ];

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class, 'pendaftarans', 'kelas_id', 'peserta_id')
            ->withTimestamps();
    }
}
