<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama', 'email', 'password', 'peran_id'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function peran()
    {
        return $this->belongsTo(Peran::class, 'peran_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'pengguna_id');
    }
}
