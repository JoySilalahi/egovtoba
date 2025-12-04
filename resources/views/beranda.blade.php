<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    
    <title>Toba Hita</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{
            --primary:#0b79b8;
            --nav-h:64px;
            --muted:#6b7280;
            --bg-light:#edf7fe;
            --dark:#0f1724;
            --max-width:1200px;
        }
        *{box-sizing:border-box;margin:0;padding:0}
        html,body{height:100%}
        body{font-family:'Poppins',system-ui,-apple-system,"Segoe UI",Roboto,Arial; color:var(--dark); background:#fff;-webkit-font-smoothing:antialiased}

        /* NAV */
        .site-nav{
            position:sticky; top:0; z-index:60;
            height:var(--nav-h);
            display:flex; align-items:center;
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid rgba(15,23,36,0.06);
            backdrop-filter: blur(4px) saturate(120%);
        }
        .nav-inner{max-width:var(--max-width); margin:0 auto; width:100%; display:flex; align-items:center; gap:12px; padding:0 16px;}
        .brand{flex:0 0 auto; display:flex; align-items:center}
        .brand img{height:42px; width:auto; display:block}
        .nav-center{flex:1 1 auto; display:flex; justify-content:center}
        .nav-menu{display:flex; gap:26px; list-style:none; align-items:center}
        .nav-menu a{display:inline-block; text-decoration:none; color:rgba(15,23,36,0.88); font-weight:600; padding:8px 8px; border-radius:6px; transition: 0.3s;}
        .nav-menu a.active, .nav-menu a:hover{color:var(--primary); background:rgba(11,121,184,0.04)}
        .nav-actions{flex:0 0 auto; display:flex; gap:10px; align-items:center}
        .nav-toggle{display:none; background:transparent; border:0; font-size:20px; color:var(--dark)}

        /* HERO */
        .hero{
            min-height:560px;
            display:flex; align-items:center; justify-content:center; text-align:center;
            padding:72px 24px 96px;
            /* Menggunakan asset() untuk gambar */
            background-image:
                linear-gradient(to bottom, rgba(7,48,71,0.55), rgba(7,48,71,0.18) 55%, rgba(255,255,255,0)),
                url("{{ asset('images/pemandangan-sawah.jpg') }}");
            background-position:center 40%;
            background-size:cover;
            color:#fff;
        }
        .hero .wrap{max-width:980px}
        .hero h1{font-size:56px;line-height:1.02;font-weight:800;margin:0 0 18px;text-shadow:0 6px 30px rgba(2,6,23,0.28)}
        .hero p{font-size:16px;color:rgba(255,255,255,0.95);margin:0 0 26px;opacity:0.95}
        .cta{display:inline-flex;align-items:center;gap:12px;background:var(--primary);color:#fff;padding:12px 22px;border-radius:999px;font-weight:700;text-decoration:none;box-shadow:0 8px 26px rgba(11,121,184,0.14); transition: transform 0.2s;}
        .cta:hover {transform: translateY(-2px);}

        /* FEATURES */
        .features{background:var(--bg-light);padding:54px 18px 84px;margin-top:-48px;border-top-left-radius:12px;border-top-right-radius:12px;position:relative;z-index:10}
        .features .container{max-width:1100px;margin:0 auto}
        .features h2{text-align:center;font-size:28px;margin-bottom:36px;color:var(--dark)}
        .grid{display:flex;gap:32px;justify-content:space-between;align-items:stretch;flex-wrap:wrap}
        .card-feature{flex:1 1 280px;background:transparent;text-align:center;padding:18px;border-radius:12px}
        .feature-icon{width:64px;height:64px;border-radius:12px;margin:0 auto 12px;display:flex;align-items:center;justify-content:center;background:#e6f7ff;color:var(--primary);font-size:26px;box-shadow:0 6px 20px rgba(11,121,184,0.06)}
        .card-feature h3{margin-bottom:8px;font-size:16px}
        .card-feature p{color:var(--muted);font-size:14px;line-height:1.6}

        /* FOOTER */
        .site-footer{background:#21323b;color:#cbd5df;padding:48px 20px}
        .footer-inner{max-width:1100px;margin:0 auto;display:flex;gap:24px;flex-wrap:wrap;justify-content:space-between}
        .footer-col{flex:1 1 220px;min-width:200px}
        .footer-logo{display:flex;align-items:center;gap:12px;margin-bottom:12px}
        .footer-logo img{height:42px}
        .footer-small{font-size:13px;color:rgba(255,255,255,0.85);line-height:1.7}
        .footer-meta{margin-top:18px;font-size:13px;color:rgba(255,255,255,0.65)}

        /* social icons */
        .social-links{display:flex;gap:14px;align-items:center;margin-top:8px}
        .social-links a{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:8px;background:transparent;text-decoration:none;border:1px solid rgba(255,255,255,0.06)}
        .social-links svg{width:20px;height:20px;fill:#cbd5df;transition:all .12s}
        .social-links a:hover svg{fill:#fff; transform:translateY(-2px)}
        .social-label{color:rgba(255,255,255,0.9); margin-bottom:6px; font-weight:600}

        /* Responsive */
        @media (max-width:980px){
            .nav-center{display:none}
            .nav-toggle{display:inline-flex}
            .hero h1{font-size:40px}
        }
        @media (max-width:520px){
            .hero{padding-top:48px;padding-bottom:60px}
            .hero h1{font-size:32px}
            .grid{flex-direction:column;align-items:center}
        }

        /* Mobile expanded menu */
        .mobile-menu{
            display:none; position:absolute; left:0; right:0; top:var(--nav-h);
            background:#fff; border-bottom:1px solid rgba(15,23,36,0.06);
            box-shadow:0 10px 30px rgba(0,0,0,0.06); padding:12px 16px;
        }
        .mobile-menu.open{display:block}
        .mobile-menu a{display:block;padding:10px 6px;border-radius:8px;color:var(--dark);text-decoration:none}
        .mobile-menu a + a{margin-top:4px}
    </style>
</head>
<body>

<header class="site-nav" role="banner">
    <div class="nav-inner">
        <a class="brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Toba Hita">
        </a>

        <nav class="nav-center" role="navigation">
            <ul class="nav-menu">
                <li><a href="/" class="active">Beranda</a></li>
                <li><a href="/profile">Profil Kabupaten</a></li>
                <li class="nav-item"><a class="nav-link" href="/daftardesa">Daftar Desa</a></li>
            </ul>
        </nav>

        <div class="nav-actions">
            <button class="nav-toggle" id="navToggle"><i class="fa fa-bars"></i></button>
        </div>
    </div>

    <div id="mobileMenu" class="mobile-menu">
        <a href="/">Beranda</a>
        <a href="/profile">Profil Kabupaten</a>
        <a href="/villages">Daftar Desa</a>
    </div>
</header>

<main>
    <section class="hero">
        <div class="wrap">
            <h1>{!! $judul_utama !!}</h1> 
            
            <p>Selamat datang di portal e‑Government Kabupaten Toba. Temukan informasi desa, transparansi anggaran, dan layanan publik dalam satu platform terintegrasi.</p>
            
            <div style="display: flex; justify-content: center; gap: 40px; margin-bottom: 30px;">
                <div>
                    <span style="font-size: 2rem; font-weight: 700;">{{ $jumlah_desa }}</span><br>
                    <span style="font-size: 0.9rem; opacity: 0.8;">Desa</span>
                </div>
                <div>
                    <span style="font-size: 2rem; font-weight: 700;">{{ number_format($jumlah_penduduk) }}</span><br>
                    <span style="font-size: 0.9rem; opacity: 0.8;">Penduduk</span>
                </div>
            </div>

            <a class="cta" href="/villages">Jelajahi Desa Sekarang <i class="fa fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Fitur Unggulan Toba Hita</h2>
            <div class="grid">
                <div class="card-feature">
                    <div class="feature-icon"><i class="fa fa-users"></i></div>
                    <h3>Data Desa</h3>
                    <p>Kelola data penduduk lebih aman & efisien dengan antarmuka yang jelas dan export data.</p>
                </div>

                <div class="card-feature">
                    <div class="feature-icon"><i class="fa fa-chart-bar"></i></div>
                    <h3>Transparansi Anggaran</h3>
                    <p>Lihat dan unduh laporan Anggaran Pendapatan dan Belanja Desa (APBDes) secara transparan.</p>
                </div>

                <div class="card-feature">
                    <div class="feature-icon"><i class="fa fa-shield-alt"></i></div>
                    <h3>Layanan Informasi</h3>
                    <p>Pelayanan publik lebih modern & cepat melalui formulir digital dan notifikasi.</p>
                </div>
            </div>
        </div>
    </section>
</main>


    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                    <div>
                        <strong style="color:#fff">Toba Hita</strong>
                        <div class="footer-small">Portal informasi terintegrasi untuk transparansi dan pelayanan publik di Kabupaten Toba.</div>
                    </div>
                </div>
                
            </div>
            <div class="footer-col">
                <h4 style="color:#fff;margin-bottom:8px">Hubungi kami</h4>
                <div class="footer-small">+62 3456 7890<br>tobahita@mail.com</div>
            </div>
            <div class="footer-col" aria-label="Ikuti kami">
                <div class="social-label">Ikuti kami</div>
                <div class="social-links">
                    <a href="#"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07C2 17.07 5.66 21.13 10.44 21.95v-6.77H8.08v-2.9h2.36V9.41c0-2.33 1.4-3.62 3.53-3.62 1.02 0 2.08.18 2.08.18v2.28h-1.17c-1.15 0-1.51.72-1.51 1.46v1.75h2.57l-.41 2.9h-2.16V21.95C18.34 21.13 22 17.07 22 12.07z"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M22 5.92c-.63.28-1.3.47-2.01.56a3.47 3.47 0 0 0 1.52-1.92 6.69 6.69 0 0 1-2.2.84 3.34 3.34 0 0 0-5.68 3.04 9.47 9.47 0 0 1-6.88-3.49 3.34 3.34 0 0 0 1.03 4.45c-.52-.02-1.01-.16-1.44-.4v.04a3.34 3.34 0 0 0 2.67 3.27c-.46.13-.94.15-1.43.06a3.35 3.35 0 0 0 3.12 2.33A6.7 6.7 0 0 1 2 18.58 9.44 9.44 0 0 0 7.29 20c5.55 0 8.58-4.6 8.58-8.58v-.39c.59-.42 1.04-.94 1.13-1.45-.25.11-.53.18-.82.21z"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm5 6.2A4.8 4.8 0 1 0 16.8 13 4.8 4.8 0 0 0 12 8.2zm6.4-3.6a1.12 1.12 0 1 0 1.12 1.12A1.12 1.12 0 0 0 18.4 4.6zM12 10.6A1.4 1.4 0 1 1 10.6 12 1.4 1.4 0 0 1 12 10.6z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>

<script>
    // Mobile menu toggle
    const toggle = document.getElementById('navToggle');
    const mobile = document.getElementById('mobileMenu');
    if(toggle && mobile){
        toggle.addEventListener('click', function(){
            mobile.classList.toggle('open');
        });
    }
</script>

</body>
</html>