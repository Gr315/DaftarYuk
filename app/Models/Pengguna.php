<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna'; 

    protected $fillable = ['nama', 'email', 'password', 'peran_id'];

    // Relasi dengan Peran
    public function peran()
    {
        return $this->belongsTo(Peran::class, 'peran_id');
    }

    // Relasi dengan Pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'pengguna_id');
    }

    // Relasi dengan KegiatanPanitia
    public function kegiatanPanitia()
    {
        return $this->hasMany(KegiatanPanitia::class, 'pengguna_id');
    }
}
