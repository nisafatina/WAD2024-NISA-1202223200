<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'kode_dosen',
        'nama_dosen',
        'nip',
        'email',
        'no_telp',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'dosen_id', 'id');
    }
}
