<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    // FUNGSI INI YANG HILANG / BELUM ADA
    public function index()
    {
        // Data untuk dikirim ke View
        $dataBeranda = [
            'judul_tab'       => 'Beranda - Toba Hita',
            'judul_utama'     => 'Membangun Toba,<br>Digitalisasi Jantung<br>Budaya Batak',
            'jumlah_desa'     => 6,
            'jumlah_penduduk' => 7515,
            'tahun_ini'       => date('Y'),
            'hero_title'      => 'Membangun Toba,<br>Digitalisasi Jantung<br>Budaya Batak', // Cadangan jika view pakai variabel lama
            'total_desa'      => 6,    // Cadangan
            'total_penduduk'  => 7515, // Cadangan
            'current_year'    => date('Y') // Cadangan
        ];

        return view('beranda', $dataBeranda);
    }
}