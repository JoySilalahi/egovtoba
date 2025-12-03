<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DaftarDesa;

class DaftarDesaSeeder extends Seeder
{
    public function run()
    {
        // Bersihkan data lama (opsional)
        // DaftarDesa::truncate();

        $data = [
            [
                'nama_desa' => 'Desa Meat',
                'deskripsi' => 'Dikenal dengan sawah teraseringnya yang subur di tepi Danau Toba dan budaya Batak yang kental.',
                'foto' => 'meat.jpg',
                'penduduk' => 900,
                'luas' => 15.2,
                'slug' => 'meat'
            ],
            [
                'nama_desa' => 'Desa Aek Bolon Julu',
                'deskripsi' => 'Desa asri yang dialiri oleh sungai jernih, menjadi sumber kehidupan bagi pertanian masyarakat sekitar.',
                'foto' => 'aek-bolon.jpg',
                'penduduk' => 250,
                'luas' => 9.7,
                'slug' => 'aek-bolon'
            ],
            [
                'nama_desa' => 'Desa Pangombusan',
                'deskripsi' => 'Terkenal dengan hasil pertanian organiknya dan rintisan skema agrowisata yang sedang dikembangkan.',
                'foto' => 'pangombusan.jpg',
                'penduduk' => 3584,
                'luas' => 35.1,
                'slug' => 'pangombusan'
            ],
            [
                'nama_desa' => 'Desa Pareparean',
                'deskripsi' => 'Pusat kerajinan tenun ulos tradisional dengan pemandangan perbukitan hijau yang menenangkan.',
                'foto' => 'pareparean.jpg',
                'penduduk' => 900,
                'luas' => 15.2,
                'slug' => 'pareparean'
            ],
            [
                'nama_desa' => 'Desa Pintu Bosi',
                'deskripsi' => 'Gerbang bersejarah menuju kawasan dataran tinggi Toba dengan peninggalan situs budaya tua.',
                'foto' => 'pintu-bosi.jpg',
                'penduduk' => 250,
                'luas' => 9.7,
                'slug' => 'pintu-bosi'
            ],
            [
                'nama_desa' => 'Desa Sigumpar Toba',
                'deskripsi' => 'Kawasan dengan nilai historis religius yang tinggi serta pendidikan awal bagi masyarakat.',
                'foto' => 'sigumpar.jpg',
                'penduduk' => 3584,
                'luas' => 35.1,
                'slug' => 'sigumpar'
            ],
        ];

        foreach ($data as $item) {
            DaftarDesa::create($item);
        }
    }
}