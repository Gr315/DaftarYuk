<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPanitia extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_panitia';

    protected $fillable = ['kegiatan_id', 'pengguna_id'];

    // Relasi dengan Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    // Relasi dengan Pengguna (Panitia)
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
