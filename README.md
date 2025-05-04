<h1 align="center">DaftarYuk (Sistem Pendaftaran Kegiatan Mahasiswa)</h1>

<p align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/LOGO_UNIVERSITAS_SULAWESI_BARAT.png/480px-LOGO_UNIVERSITAS_SULAWESI_BARAT.png" width="200" alt="Logo Unsulbar">
</p>

<p align="center"><strong>Greis Banne Liling</strong></p>
<p align="center">D0223526</p>
<p align="center"><strong>Framework Web Based</strong></p>
<p align="center">2025</p>

---


## 🎯 Role dan Fitur

### Admin
- Kelola pengguna (tambah/edit/hapus)
- Kelola kegiatan
- Lihat semua data

### Panitia
- Melihat kegiatan yang tersedia
- Melihat peserta dan mencatat kehadiran

### Mahasiswa
- Melihat daftar kegiatan
- Mendaftar kegiatan
- Cek status kehadiran

---

## 🧩 Tabel Database dan Struktur

### 🔹 Tabel `pengguna`

| Field          | Tipe Data   | Keterangan                               |
|----------------|-------------|------------------------------------------|
| id             | bigint      | Primary Key, Auto Increment              |
| nama           | string      | Nama lengkap pengguna                    |
| email          | string      | Email pengguna                           |
| password       | string      | Password terenkripsi (bcrypt)           |
| peran_id       | foreign key | Relasi ke tabel peran                    |
| remember_token | string/null | Token sesi login                         |
| created_at     | timestamp   | Otomatis oleh Laravel                    |
| updated_at     | timestamp   | Otomatis oleh Laravel                    |

### 🔹 Tabel `peran`

| Field      | Tipe Data | Keterangan                           |
|------------|-----------|--------------------------------------|
| id         | bigint    | Primary Key, Auto Increment          |
| nama       | string    | Nama peran (admin, panitia, mahasiswa) |
| created_at | timestamp | Otomatis oleh Laravel                |
| updated_at | timestamp | Otomatis oleh Laravel                |

### 🔹 Tabel `pendaftaran`

| Field        | Tipe Data   | Keterangan                         |
|--------------|-------------|------------------------------------|
| id           | bigint      | Primary Key                        |
| pengguna_id  | foreign key | Relasi ke tabel pengguna           |
| kegiatan_id  | foreign key | Relasi ke tabel kegiatan           |
| created_at   | timestamp   | Otomatis oleh Laravel              |
| updated_at   | timestamp   | Otomatis oleh Laravel              |

### 🔹 Tabel `kegiatan`

| Field      | Tipe Data | Keterangan                         |
|------------|-----------|------------------------------------|
| id         | bigint    | Primary Key, Auto Increment        |
| nama       | string    | Nama kegiatan                      |
| deskripsi  | string    | Deskripsi kegiatan                 |
| tanggal    | date      | Tanggal pelaksanaan kegiatan      |
| created_at | timestamp | Otomatis oleh Laravel              |
| updated_at | timestamp | Otomatis oleh Laravel              |

### 🔹 Tabel `kehadiran`

| Field           | Tipe Data   | Keterangan                            |
|------------------|-------------|----------------------------------------|
| id               | bigint      | Primary Key                            |
| pendaftaran_id   | foreign key | Relasi ke tabel pendaftaran            |
| hadir            | boolean     | Status kehadiran (true / false)        |
| created_at       | timestamp   | Otomatis oleh Laravel                  |
| updated_at       | timestamp   | Otomatis oleh Laravel                  |

---

## 🔗 Jenis Relasi dan Tabel yang Berelasi

### 1. One to Many  
**Tabel `peran` ➝ Tabel `pengguna`**  
> Satu peran bisa dimiliki oleh banyak pengguna, tetapi satu pengguna hanya punya satu peran.

### 2. One to Many  
**Tabel `pengguna` ➝ Tabel `pendaftaran`**  
> Satu pengguna bisa mendaftar ke banyak kegiatan, tapi satu pendaftaran hanya milik satu pengguna.

### 3. One to Many  
**Tabel `kegiatan` ➝ Tabel `pendaftaran`**  
> Satu kegiatan bisa diikuti banyak pengguna, tapi satu pendaftaran hanya untuk satu kegiatan.

### 4. One to One  
**Tabel `pendaftaran` ➝ Tabel `kehadiran`**  
> Satu pendaftaran hanya memiliki satu catatan kehadiran, dan satu kehadiran hanya untuk satu pendaftaran.
