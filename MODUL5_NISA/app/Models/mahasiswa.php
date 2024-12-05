<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan
    protected $table = 'mahasiswa';

    // Mendefinisikan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'jurusan',
        'dosen_id',
    ];

    /**
     * Relasi ke model Dosen
     * Mahasiswa belongs to Dosen
     */
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
