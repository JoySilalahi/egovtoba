<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Nama tabel kita set manual jadi 'daftardesa'
    Schema::create('daftardesa', function (Blueprint $table) {
        $table->id();
        $table->string('nama_desa');
        $table->text('deskripsi');
        $table->string('foto');         // Nama file gambar
        $table->integer('penduduk');    // Jumlah penduduk
        $table->float('luas');          // Luas wilayah
        $table->string('slug');         // Untuk link detail
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('daftardesa');
}
};
