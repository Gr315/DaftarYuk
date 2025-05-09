<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'tanggal'];

    // Relasi dengan KegiatanPanitia (hasMany)
    public function kegiatanPanitia()
    {
        return $this->hasMany(KegiatanPanitia::class, 'kegiatan_id');
    }

    // Relasi dengan Pendaftaran (hasMany)
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'kegiatan_id');
    }
}
