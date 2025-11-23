<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon', 'alamat'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'pendaftarans', 'peserta_id', 'kelas_id')
            ->withTimestamps();
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
