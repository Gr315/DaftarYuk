<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $table = 'peran';

    protected $fillable = ['nama'];

    // Relasi dengan Pengguna
    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'peran_id');
    }
}
