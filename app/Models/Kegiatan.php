<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = ['nama', 'deskripsi', 'tanggal'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'kegiatan_id');
    }
}
