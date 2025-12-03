<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run()
    {
        // Bersihkan data lama biar tidak duplikat
        Agenda::truncate();

        // Agenda 1: Besok
        Agenda::create([
            'title' => 'Rapat Koordinasi Pembangunan Infrastruktur',
            'date' => Carbon::now()->addDay()->format('Y-m-d'), // Besok
            'time_start' => '09:00:00',
            'time_end' => '12:00:00',
            'location' => 'Aula Kantor Bupati Toba',
            'type' => 'Rapat'
        ]);

        // Agenda 2: 3 Hari Lagi
        Agenda::create([
            'title' => 'Festival Ulos Nasional 2025',
            'date' => Carbon::now()->addDays(3)->format('Y-m-d'), // 3 Hari lagi
            'time_start' => '08:00:00',
            'time_end' => '17:00:00',
            'location' => 'Lapangan Sisingamangaraja',
            'type' => 'Sosialisasi'
        ]);

        // Agenda 3: Minggu Depan
        Agenda::create([
            'title' => 'Musyawarah Perencanaan Pembangunan (Musrenbang)',
            'date' => Carbon::now()->addWeek()->format('Y-m-d'), // Minggu depan
            'time_start' => '10:00:00',
            'time_end' => '15:00:00',
            'location' => 'Pendopo Rumah Dinas',
            'type' => 'Rapat'
        ]);
    }
}