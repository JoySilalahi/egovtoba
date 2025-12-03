<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal Administrator</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; overflow: hidden; }
        .login-wrapper { min-height: 100vh; width: 100%; background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("{{ asset('images/danau-toba.jpg') }}"); background-size: cover; background-position: center; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .login-card { background: white; width: 100%; max-width: 440px; padding: 45px 40px; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.25); text-align: center; position: relative; }
        .login-logo { height: 55px; margin-bottom: 20px; }
        .login-title { font-size: 1.5rem; font-weight: 700; color: #1e293b; margin-bottom: 5px; }
        .login-subtitle { font-size: 0.9rem; color: #64748b; margin-bottom: 35px; font-weight: 400; }
        .form-label { font-weight: 600; font-size: 0.9rem; color: #334155; text-align: left; display: block; margin-bottom: 8px; }
        .form-control { background-color: #f1f5f9; border: 1px solid #e2e8f0; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; margin-bottom: 25px; transition: all 0.3s; }
        .form-control:focus { background-color: white; border-color: #0b79b8; box-shadow: 0 0 0 3px rgba(11, 121, 184, 0.1); }
        .btn-login { background-color: #0077b6; color: white; font-weight: 600; width: 100%; padding: 12px; border-radius: 8px; border: none; font-size: 1rem; transition: background 0.3s; margin-bottom: 20px; }
        .btn-login:hover { background-color: #0284c7; }
        .login-footer-text { font-size: 0.9rem; color: #333; margin-bottom: 12px; }
        .link-register { color: #8b5cf6; text-decoration: none; font-weight: 500; }
        .link-home { color: #0ea5e9; text-decoration: none; font-size: 0.9rem; display: inline-block; }
        .link-home:hover, .link-register:hover { text-decoration: underline; }
        .copyright { margin-top: 40px; color: rgba(255,255,255,0.7); font-size: 0.8rem; font-weight: 300; }
        .is-invalid { border-color: #dc3545 !important; }
        .invalid-feedback { color: #dc3545; font-size: 0.8rem; margin-top: -20px; margin-bottom: 15px; text-align: left; }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="login-logo">
            <h1 class="login-title">Portal Administrator</h1>
            <p class="login-subtitle">Silahkan masuk untuk mengelola sistem.</p>

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="text-start">
                    <label class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-start">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="login-footer-text">
                Belum punya akun? <a href="/register" class="link-register">Daftar</a>
            </div>
            <a href="/" class="link-home">Kembali ke beranda</a>
        </div>
        <div class="copyright">
            &copy; 2025 Pemerintah Kabupaten Toba. Hak Cipta Dilindungi.
        </div>
    </div>

</body>
</html>