<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- Imports Controller Publik ---
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\DaftarDesaController;
use App\Http\Controllers\AuthController;

// --- Imports Controller Admin (Menggunakan Alias) ---
use App\Http\Controllers\Admin\KabupatenController as AdminKabupatenController;
use App\Http\Controllers\Admin\DesaController as AdminDesaController;


/*
|--------------------------------------------------------------------------
| A. PUBLIC ROUTES (Akses Umum)
|--------------------------------------------------------------------------
*/

// 1. Beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// 2. Profil Kabupaten
Route::get('/profile', [KabupatenController::class, 'index'])->name('profile');
Route::get('/get-agendas', [KabupatenController::class, 'getAgendas'])->name('get.agendas'); // AJAX Kalender

// 3. Daftar Desa
Route::get('/daftardesa', [DaftarDesaController::class, 'index'])->name('daftardesa');


// 4. Otentikasi (Akses Form Login/Register)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Asumsi route register ada
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


/*
|--------------------------------------------------------------------------
| B. PROTECTED ROUTES (Akses Admin/Management)
|--------------------------------------------------------------------------
*/

// Middleware 'auth' memastikan user sudah login
Route::middleware('auth')->group(function () {
    
    // Logout harus di dalam middleware 'auth'
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
    // --- PENYARINGAN UTAMA SETELAH LOGIN ---
    // Route '/dashboard' digunakan untuk mengalihkan user ke halaman yang sesuai
    Route::get('/dashboard', function () {
        $user = Auth::user();
        
        if ($user->role === 'kabupaten') {
            return redirect()->route('admin.kabupaten.edit');
        }
        
        if ($user->role === 'desa' || $user->role === 'petugasdesa') {
            return redirect()->route('admin.desa.edit'); 
        }

        return redirect()->route('logout'); // Jika role tidak terdeteksi
    })->name('dashboard');


    // 1. AKSES KHUSUS LEVEL KABUPATEN
    // Middleware 'role:kabupaten' mengunci akses hanya untuk Admin Kabupaten
    Route::middleware('role:kabupaten')->prefix('admin')->group(function () {
        
        // Tugas 1: Edit Profil Global (Visi, Misi, Pimpinan)
        Route::get('/kabupaten/edit', [AdminKabupatenController::class, 'edit'])->name('admin.kabupaten.edit');
        Route::post('/kabupaten/update', [AdminKabupatenController::class, 'update'])->name('admin.kabupaten.update');
        
        // Tugas 2: Tambah Desa Baru
        Route::get('/desa/create', [AdminDesaController::class, 'create'])->name('admin.desa.create');
        Route::post('/desa/store', [AdminDesaController::class, 'store'])->name('admin.desa.store');
        
        // Tugas 3: CRUD Agenda (Manajemen Informasi)
        Route::resource('agendas', AdminAgendaController::class); // Contoh penggunaan resource
    });

    
    // 2. AKSES KHUSUS LEVEL DESA
    // Middleware 'role:desa' mengunci akses hanya untuk Admin Desa
    Route::middleware('role:desa')->prefix('admin')->group(function () {
        
        // Tugas 1: Halaman Edit Desa Spesifik (Admin Desa)
        // Di dalam Controller 'edit' ini nanti ada logika pengecekan user_id ke desa_id
        Route::get('/desa/edit', [AdminDesaController::class, 'edit'])->name('admin.desa.edit'); 
        Route::post('/desa/update', [AdminDesaController::class, 'update'])->name('admin.desa.update');
    });
});