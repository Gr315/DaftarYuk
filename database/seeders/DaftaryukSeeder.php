<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftaryukSeeder extends Seeder
{

    public function run(): void
    {
        // Tabel peran
        DB::table('peran')->insert([
            ['id' => 1, 'nama' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'panitia', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'mahasiswa', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tabel pengguna (5 orang dengan kombinasi peran)
        DB::table('pengguna')->insert([
            [
                'nama' => 'Surayandini',
                'email' => 'andini@gmail.com',
                'password' => Hash::make('pasword'),
                'peran_id' => 1,
                'email_terverifikasi' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Marko',
                'email' => 'marko@gmail.com',
                'password' => Hash::make('pasword'),
                'peran_id' => 2,
                'email_terverifikasi' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra',
                'email' => 'citra@gmail.com',
                'password' => Hash::make('pasword'),
                'peran_id' => 3,
                'email_terverifikasi' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Farhan',
                'email' => 'farhan@gmail.com',
                'password' => Hash::make('pasword'),
                'peran_id' => 3,
                'email_terverifikasi' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Wahyuni',
                'email' => 'wahyuni@gmail.com',
                'password' => Hash::make('pasword'),
                'peran_id' => 3,
                'email_terverifikasi' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Tabel kegiatan
        DB::table('kegiatan')->insert([
            ['nama' => 'Seminar Nasional', 'deskripsi' => 'Seminar besar', 'tanggal' => '2025-06-01', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Workshop Laravel', 'deskripsi' => 'Belajar Laravel', 'tanggal' => '2025-06-02', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Bakti Sosial', 'deskripsi' => 'Ke desa binaan', 'tanggal' => '2025-06-03', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Expo Kampus', 'deskripsi' => 'Pameran UKM', 'tanggal' => '2025-06-04', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lomba UI/UX', 'deskripsi' => 'Desain aplikasi', 'tanggal' => '2025-06-05', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tabel kegiatan_panitia 
        DB::table('kegiatan_panitia')->insert([
            ['kegiatan_id' => 1, 'pengguna_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['kegiatan_id' => 2, 'pengguna_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['kegiatan_id' => 3, 'pengguna_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tabel pendaftaran (dari mahasiswa id 3, 4, 5)
        DB::table('pendaftaran')->insert([
            ['pengguna_id' => 3, 'kegiatan_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pengguna_id' => 3, 'kegiatan_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['pengguna_id' => 4, 'kegiatan_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['pengguna_id' => 5, 'kegiatan_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['pengguna_id' => 5, 'kegiatan_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Tabel kehadiran
        DB::table('kehadiran')->insert([
            ['pendaftaran_id' => 1, 'hadir' => true, 'created_at' => now(), 'updated_at' => now()],
            ['pendaftaran_id' => 2, 'hadir' => false, 'created_at' => now(), 'updated_at' => now()],
            ['pendaftaran_id' => 3, 'hadir' => true, 'created_at' => now(), 'updated_at' => now()],
            ['pendaftaran_id' => 4, 'hadir' => false, 'created_at' => now(), 'updated_at' => now()],
            ['pendaftaran_id' => 5, 'hadir' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
