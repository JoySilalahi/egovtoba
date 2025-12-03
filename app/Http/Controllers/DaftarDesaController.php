<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarDesa; // Pastikan Model ini sudah dibuat sebelumnya

class DaftarDesaController extends Controller
{
    public function index(Request $request)
    {
        $query = DaftarDesa::query();

        // Fitur Cari
        if ($request->has('cari')) {
            $query->where('nama_desa', 'like', '%' . $request->cari . '%');
        }

        $list_desa = $query->get();

        // PENTING: Kita panggil view 'daftardesa', BUKAN 'villages'
        return view('daftardesa', compact('list_desa'));
    }
}