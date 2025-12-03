<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda; // Pastikan Model ini di-import
use Carbon\Carbon;     // Pastikan Carbon di-import untuk tanggal

class KabupatenController extends Controller
{
    // 1. FUNGSI HALAMAN UTAMA (Load Awal)
    public function index()
    {
        // Ambil data untuk tampilan awal (3 Agenda terdekat mulai hari ini)
        $upcoming_agendas = Agenda::where('date', '>=', Carbon::now()->format('Y-m-d'))
                            ->orderBy('date', 'asc')
                            ->orderBy('time_start', 'asc')
                            ->take(3)
                            ->get();

        return view('kabupaten', compact('upcoming_agendas'));
    }

    // 2. FUNGSI AJAX (Dipanggil saat Klik Tanggal di Kalender)
    public function getAgendas(Request $request)
    {
        // Ambil tanggal yang dikirim dari Javascript (misal: 2025-12-04)
        $date = $request->query('date');

        // Validasi sederhana
        if (!$date) {
            return response()->json(['error' => 'Tanggal tidak valid'], 400);
        }

        try {
            // Cari agenda di database sesuai tanggal yang diklik
            $agendas = Agenda::whereDate('date', $date)
                        ->orderBy('time_start', 'asc')
                        ->get()
                        ->map(function($agenda) {
                            $now = Carbon::now();
                            
                            // Parsing Waktu dengan Aman
                            try {
                                $start = Carbon::parse($agenda->date . ' ' . $agenda->time_start);
                                // Jika time_end null, anggap selesai 2 jam kemudian
                                $end = $agenda->time_end 
                                    ? Carbon::parse($agenda->date . ' ' . $agenda->time_end) 
                                    : $start->copy()->addHours(2);
                            } catch (\Exception $e) {
                                // Fallback jika format jam error di DB
                                $start = Carbon::parse($agenda->date);
                                $end = $start->copy()->addHours(1);
                            }

                            // Logika Penentuan Status (Selesai / Berlangsung / Akan Datang)
                            if ($now->gt($end)) {
                                $status = 'Telah Selesai';
                                $badgeColor = 'bg-secondary'; // Abu-abu
                            } elseif ($now->between($start, $end)) {
                                $status = 'Sedang Berlangsung';
                                $badgeColor = 'bg-success'; // Hijau
                            } else {
                                $status = 'Akan Datang';
                                $badgeColor = 'bg-primary'; // Biru
                            }

                            // Data yang dikirim kembali ke Browser
                            return [
                                'title' => $agenda->title,
                                'type' => $agenda->type,
                                'location' => $agenda->location,
                                'time_start' => $start->format('H:i'), // Format 09:00
                                'time_end' => $end->format('H:i'),     // Format 12:00
                                'status' => $status,
                                'badge_color' => $badgeColor
                            ];
                        });

            // Kirim respon JSON sukses
            return response()->json($agendas);

        } catch (\Exception $e) {
            // Jika ada error server, kirim pesan error (Lihat di Console Browser)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}