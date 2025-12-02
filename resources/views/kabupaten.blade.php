<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kabupaten Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
        body{font-family:'Poppins',sans-serif;background:#fff;color:var(--dark)}

        /* NAV */
        .site-nav{
            position:sticky;top:0;z-index:60;height:var(--nav-h);
            display:flex;align-items:center;background:rgba(255,255,255,0.95);
            border-bottom:1px solid rgba(15,23,36,0.06);
            backdrop-filter:blur(4px) saturate(120%);
        }
        .navbar-container{
            max-width:var(--max-width);
            margin:0 auto;display:flex;align-items:center;
            gap:12px;padding:10px 16px;width:100%;
        }
        .brand img{height:42px}
        .nav-menu{display:flex;gap:28px;list-style:none;margin-left:40px}
        .nav-menu a{color:var(--muted);font-weight:600;text-decoration:none;padding:8px 10px;border-radius:10px}
        .nav-menu a:hover,.nav-menu a.active{color:var(--primary);background:#e8f3fc}

        /* HERO */
        .hero{
            background-size:cover;background-position:center 65%;
            color:white;padding:60px 0 40px;display:flex;align-items:center;
        }
        .hero-inner{max-width:1000px;margin:auto;text-align:center;padding:0 20px}
        .hero h1{font-size:48px;font-weight:700;margin-bottom:8px}
        .hero-subtitle{opacity:.9;margin-bottom:30px}
        .hero-stats{display:flex;justify-content:center;gap:40px;margin-top:30px}
        .stat-number{font-size:36px;font-weight:700}

        /* CONTENT */
        .content-container{max-width:1200px;margin:auto;padding:40px 20px}
        .two-column-layout{display:grid;grid-template-columns:1fr 1fr;gap:30px}
        
        .section{
            background:white;padding:30px;border-radius:12px;
            box-shadow:0 2px 8px rgba(0,0,0,0.06);margin-bottom:30px;
        }
        .section-title{font-size:20px;font-weight:700;margin-bottom:20px;border-bottom:2px solid #e2e8f0;padding-bottom:12px}
        .section-content{line-height:1.7;color:#475569}

        /* BUPATI */
        .bupati-section{text-align:center}
        .bupati-container{display:flex;justify-content:center;gap:30px;flex-wrap:wrap}
        .bupati-card{text-align:center}
        .bupati-photo{width:140px;height:170px;object-fit:cover;border-radius:10px;box-shadow:0 4px 10px rgba(0,0,0,.15)}

        /* Visi Misi */
        .visi-misi-section{margin-top:20px}
        .visi-label,.misi-label{font-weight:700;margin-bottom:8px}
        .misi-list li{margin-bottom:6px}

        /* FOOTER */
        footer{background:#2c3e50;color:white;padding:40px 20px;margin-top:40px}
        .footer-container{max-width:1200px;margin:auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:40px}
        .footer-section p,.footer-section a{font-size:14px;color:#cbd5e1;text-decoration:none}
    </style>
</head>

<body>

<!-- NAV -->
<nav class="site-nav">
    <div class="navbar-container">
        <a class="brand" href="#">
            <img src="/images/logo.png" alt="Logo Toba">
        </a>

        <ul class="nav-menu">
            <li><a href="/">Beranda</a></li>
            <li><a class="active" href="/profile">Profil Kabupaten</a></li>
            <li><a href="/villages">Daftar Desa</a></li>
        </ul>
    </div>
</nav>

<!-- HERO -->
<div class="hero" style="background-image:
    linear-gradient(to bottom, rgba(20,50,90,0.6), rgba(255,255,255,0)),
    url('/images/pemandangan-sawah.jpg');">

    <div class="hero-inner">
        <h1>Profil Kabupaten Toba</h1>
        <p class="hero-subtitle">Jantung Budaya Batak di Pesisir Danau Toba</p>

        <div class="hero-stats">
            <div>
                <span class="stat-number">16</span>
                <div>Kecamatan</div>
            </div>
            <div>
                <span class="stat-number">75.515</span>
                <div>Penduduk</div>
            </div>
            <div>
                <span class="stat-number">12</span>
                <div>Agenda</div>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="content-container">
    <div class="two-column-layout">

        <!-- LEFT -->
        <div class="section">
            <h2 class="section-title">Sejarah Singkat</h2>
            <div class="section-content">
                <p>Kabupaten Toba Samosir dibentuk dari pemekaran Kabupaten Tapanuli Utara berdasarkan UU No. 12 Tahun 1998.</p>
                <p>Pada tahun 1999, Kabupaten ini resmi berdiri dengan Drs. Sahala Tampubolon sebagai Bupati pertama.</p>
                <p>Total kecamatan kini berjumlah 16 kecamatan hasil pemekaran bertahap.</p>
            </div>
        </div>

        <!-- RIGHT -->
        <div>

            <!-- Bupati -->
            <div class="section bupati-section">
                <h2 class="section-title">Bupati & Wakil Bupati</h2>

                <div class="bupati-container">
                    <div class="bupati-card">
                        <img class="bupati-photo" src="/images/bupati.jpg">
                        <div class="bupati-name">Effendi Sintong Napitupulu</div>
                        <div>Bupati Toba</div>
                        <div>Periode 2021–2026</div>
                    </div>

                    <div class="bupati-card">
                        <img class="bupati-photo" src="/images/wakil-bupati.jpg">
                        <div class="bupati-name">Audi Murphy Sitorus</div>
                        <div>Wakil Bupati</div>
                        <div>Periode 2021–2026</div>
                    </div>
                </div>
            </div>

            <!-- VISI MISI -->
            <div class="section visi-misi-section">
                <h2 class="section-title">Visi & Misi</h2>

                <div class="visi-box">
                    <div class="visi-label">Visi:</div>
                    <div>Toba Unggul dan Bersinar</div>
                </div>

                <div class="misi-box">
                    <div class="misi-label">Misi:</div>
                    <ul class="misi-list">
                        <li>Meningkatkan SDM yang andal dan berbudaya.</li>
                        <li>Mempercepat pembangunan infrastruktur.</li>
                        <li>Mewujudkan birokrasi yang bersih dan melayani.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>Tentang Toba</h4>
            <p>Kabupaten Toba adalah wilayah budaya Batak yang berada di pesisir Danau Toba.</p>
        </div>

        <div class="footer-section">
            <h4>Kontak</h4>
            <p>Email: info@tobahita.go.id</p>
            <p>Telp: (0623) 00000</p>
        </div>

        <div class="footer-section">
            <h4>Tautan Cepat</h4>
            <a href="/">Beranda</a><br>
            <a href="/profile">Profil Kabupaten</a><br>
            <a href="/villages">Daftar Desa</a>
        </div>
    </div>

    <p style="text-align:center;margin-top:15px;font-size:12px;color:#cbd5e1;">
        © 2025 Pemerintah Kabupaten Toba
    </p>
</footer>

</body>
</html>
