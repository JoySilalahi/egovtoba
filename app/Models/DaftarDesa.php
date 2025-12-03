<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarDesa extends Model
{
    use HasFactory;

    // === TAMBAHKAN BARIS INI ===
    // Memberitahu Laravel bahwa nama tabelnya adalah 'daftardesa' (bukan daftar_desas)
    protected $table = 'daftardesa'; 

    protected $fillable = [
        'nama_desa', 'deskripsi', 'foto', 'penduduk', 'luas', 'slug'
    ];
}