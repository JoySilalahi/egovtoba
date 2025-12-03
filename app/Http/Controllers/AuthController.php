<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User; 

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Jika user sudah login, arahkan sesuai role
            $user = Auth::user();
            if ($user->role === 'kabupaten') {
                return redirect()->route('admin.kabupaten.edit');
            } elseif ($user->role === 'desa') {
                return redirect()->route('admin.desa.edit');
            }
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    // 2. Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        // Coba Autentikasi menggunakan kolom 'username'
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            
            // Logika Pengalihan Berdasarkan Peran
            $user = Auth::user();

            if ($user->role === 'kabupaten') {
                return redirect()->route('admin.kabupaten.edit');
            } 
            
            if ($user->role === 'desa' || $user->role === 'petugasdesa') {
                return redirect()->route('admin.desa.edit');
            }
            
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['username' => 'Nama pengguna atau kata sandi salah.',])->onlyInput('username');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}