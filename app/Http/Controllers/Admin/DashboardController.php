<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarDesa; // Untuk statistik desa
use App\Models\User; // Untuk data user

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Pengecekan Peran (ROLE CHECK) - MENGAMANKAN DASHBOARD
        if (Auth::user()->role !== 'kabupaten') {
            abort(403, 'Akses ditolak. Anda bukan Admin Kabupaten.');
        }

        // 2. Ambil Statistik
        $total_desa = DaftarDesa::count();
        $total_penduduk = DaftarDesa::sum('penduduk');
        
        // 3. Data Pimpinan (Untuk tampilan)
        $official_bupati = (object)['name' => 'Effendi Simbolon P.', 'role' => 'Bupati', 'periode' => '2024-2025'];
        $official_wakil = (object)['name' => 'Audi Murphy Sitorus', 'role' => 'Wakil Bupati', 'periode' => '2024-2025'];

        return view('admin.dashboard', [
            'user' => Auth::user(),
            'total_desa' => $total_desa,
            'total_penduduk' => $total_penduduk,
            'official_bupati' => $official_bupati,
            'official_wakil' => $official_wakil
        ]);
    }
}