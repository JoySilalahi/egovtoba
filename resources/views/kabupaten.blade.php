<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kabupaten Toba</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8faff;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background-color: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            margin-left: 25px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: #0b79b8 !important;
            font-weight: 700;
        }

        /* === HERO SECTION (DI PERBAIKI POSISI GAMBAR) === */
        .hero {
            position: relative;
            background: 
                linear-gradient(to bottom, 
                    rgba(15, 23, 42, 0.4) 0%, 
                    rgba(15, 23, 42, 0.3) 60%, 
                    rgba(15, 23, 42, 0.8) 100%),
                url("{{ asset('images/danau-toba.jpg') }}"); /* Menggunakan gambar yang diminta */
            
            background-size: cover;
            /* PERBAIKAN: Ubah posisi ke 'center center' agar fokus ke tengah pemandangan */
            background-position: center center; 
            height: 550px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-bottom: 60px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 5px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
            letter-spacing: -1px;
        }
        
        .hero p {
            font-size: 1.3rem;
            font-weight: 400;
            opacity: 0.95;
            margin-bottom: 40px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.5);
        }

        /* Stats di Hero */
        .hero-stats {
            display: flex;
            gap: 80px; /* Jarak antar angka */
            margin-top: 10px;
            /* Flexbox akan otomatis menengahkan konten */
        }
        .stat-item { 
            text-align: center; 
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
            line-height: 1;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .stat-label { 
            font-size: 1rem; 
            font-weight: 500; 
            opacity: 0.9; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }


        /* KONTEN WRAPPER UTAMA */
        .content-wrapper {
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }

        /* CARD UTAMA */
        .main-card {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.06);
            margin-bottom: 60px;
        }

        .section-title {
            color: #1e3a8a;
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 4px;
            background: #0b79b8;
            border-radius: 2px;
        }

        .text-content {
            font-size: 1rem;
            line-height: 2;
            color: #555;
            text-align: justify;
        }
        .text-content p { margin-bottom: 25px; }

        /* Visi Misi Box */
        .visi-misi-box {
            background: #f8fbff;
            border-radius: 16px;
            padding: 30px;
            border-left: 5px solid #0b79b8;
            margin-top: 30px;
        }
        .vm-label { font-weight: 700; color: #1e3a8a; margin-bottom: 5px; font-size: 1.1rem; }
        .vm-text { font-size: 1rem; color: #555; line-height: 1.6; }
        .misi-list { padding-left: 20px; margin-bottom: 0; }
        .misi-list li { margin-bottom: 8px; }

        /* Leader Cards */
        .leader-container { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .leader-card {
            background: #fff;
            border-radius: 15px;
            padding: 20px 10px;
            text-align: center;
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }
        .leader-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-color: #bde0fe;
        }
        .leader-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            object-position: top;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .leader-name { font-size: 0.9rem; font-weight: 700; color: #1e3a8a; margin-bottom: 5px; }
        .leader-role { font-size: 0.8rem; color: #777; font-weight: 500; }
        .leader-period {
            font-size: 0.75rem;
            color: #0b79b8;
            background: #e0f2fe;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 8px;
            font-weight: 600;
        }

        /* --- SECTION BERITA & PENGUMUMAN --- */
        .news-section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .news-main-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }
        
        .news-tabs {
            background: white;
            display: inline-flex;
            border-radius: 50px;
            padding: 6px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
            margin-bottom: 40px;
        }
        .news-tab-item {
            padding: 10px 35px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            color: #64748b;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .news-tab-item.active {
            background-color: #0b79b8;
            color: white;
            box-shadow: 0 4px 10px rgba(11, 121, 184, 0.3);
        }

        /* Style Berita */
        .news-grid-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            height: 100%;
            border: 1px solid #f1f5f9;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            transition: all 0.3s;
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        .news-grid-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
            border-color: #e2e8f0;
        }

        /* Style Pengumuman */
        .announce-grid-card {
            background: #fffbf0;
            border-radius: 16px;
            padding: 25px;
            height: 100%;
            border: 1px solid #fde68a;
            border-left: 5px solid #d97706;
            box-shadow: 0 4px 6px rgba(217, 119, 6, 0.05);
            transition: all 0.3s;
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        .announce-grid-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(217, 119, 6, 0.1);
        }
        .announce-grid-card .news-title { color: #92400e; }
        .announce-grid-card .news-desc { color: #b45309; }

        /* Icon Box */
        .news-icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        .icon-blue { background: #e0f2fe; color: #0284c7; }
        .icon-purple { background: #f3e8ff; color: #7e22ce; }
        .icon-announce-orange { background: #fff7ed; color: #ea580c; border: 1px solid #fed7aa; }
        .icon-announce-green { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }

        .news-content { flex: 1; }
        
        .news-category {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        .cat-blue { background: #f0f9ff; color: #0369a1; }
        .cat-purple { background: #faf5ff; color: #7e22ce; }
        .cat-announce-orange { background: #fff7ed; color: #c2410c; }
        .cat-announce-green { background: #f0fdf4; color: #15803d; }

        .news-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
            line-height: 1.4;
            display: block;
            text-decoration: none;
            transition: color 0.2s;
        }
        .news-title:hover { color: #0b79b8; }

        .news-desc {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .news-meta {
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .announce-grid-card .news-meta { color: #d97706; }

        /* Dokumentasi */
        .doc-section { margin-top: 80px; margin-bottom: 50px; }
        .doc-header { text-align: center; margin-bottom: 40px; }
        .doc-title {
            color: #1e3a8a;
            font-weight: 800;
            font-size: 2rem;
            position: relative;
            display: inline-block;
        }
        .doc-img {
            width: 100%; height: 250px; object-fit: cover; border-radius: 12px;
            transition: transform 0.3s;
        }
        .doc-img:hover { transform: scale(1.03); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }

        /* Footer */
        footer {
            background-color: #0f172a;
            color: white;
            padding: 70px 0 30px;
            margin-top: 80px;
        }
        .footer-logo { height: 60px; margin-bottom: 20px; filter: brightness(0) invert(1); }
        
        .fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="45">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/profile">Profil Kabupaten</a></li>
                    <li class="nav-item"><a class="nav-link" href="/villages">Daftar Desa</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <h1>Profil Kabupaten Toba</h1>
            <p>Jantung Budaya Batak di Pesisir Danau Toba</p>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">16</span> 
                    <span class="stat-label">Kecamatan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">7,515</span>
                    <span class="stat-label">Penduduk</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container content-wrapper">
        
        <div class="main-card">
            <div class="row">
                
                <div class="col-lg-7 pe-lg-5 mb-5 mb-lg-0">
                    <h2 class="section-title">Sejarah Singkat</h2>
                    <div class="text-content">
                        <p>
                            Kabupaten Toba Samosir dibentuk dari pemekaran Kabupaten Tapanuli Utara berdasarkan Undang-Undang Nomor 12 Tahun 1998. Kabupaten ini resmi berdiri pada 8 Maret 1999 dengan Drs. Sahala Tampubolon dilantik sebagai penjabat Bupati Pertama. Pembentukan kabupaten ini merupakan wujud nyata aspirasi masyarakat untuk meningkatkan pelayanan publik dan mempercepat pembangunan daerah.
                        </p>
                        <p>
                            Pada awal pembentukannya, Kabupaten Toba memiliki 12 kecamatan. Seiring dengan dinamika perkembangan wilayah dan kebutuhan administrasi pemerintahan yang lebih efektif, pada tahun 2000 dilakukan pemekaran wilayah. Kecamatan Ronggur Nihuta dipecah menjadi 3 kecamatan baru, serta penambahan kecamatan lainnya, sehingga kini Kabupaten Toba memiliki total 16 kecamatan yang melayani ribuan penduduk.
                        </p>
                        <p>
                            Nama Kabupaten Toba Samosir kemudian secara resmi berganti nama menjadi Kabupaten Toba berdasarkan Peraturan Pemerintah Nomor 14 Tahun 2020. Perubahan nama ini bertujuan untuk mempertegas identitas wilayah geografis kabupaten yang sebagian besar berada di wilayah daratan Toba, membedakannya dengan Kabupaten Samosir yang berada di pulau.
                        </p>
                    </div>
                </div>

                <div class="col-lg-5">
                    
                    <h2 class="section-title mb-4" style="font-size: 1.4rem;">Pimpinan Daerah</h2>
                    <div class="leader-container">
                        <div class="leader-card">
                            <img src="{{ asset('images/bupati.jpg') }}" alt="Bupati" class="leader-img">
                            <div class="leader-name">Effendi Sintong</div>
                            <div class="leader-role">Bupati Toba</div>
                            <span class="leader-period">2021-2026</span>
                        </div>
                        <div class="leader-card">
                            <img src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati" class="leader-img">
                            <div class="leader-name">Audi Murphy</div>
                            <div class="leader-role">Wakil Bupati</div>
                            <span class="leader-period">2021-2026</span>
                        </div>
                    </div>

                    <div class="visi-misi-box">
                        <h3 class="section-title mb-3" style="font-size: 1.3rem;">Visi & Misi</h3>
                        <div class="vm-label">Visi</div>
                        <div class="vm-text mb-4">"Terwujudnya Kabupaten Toba yang Unggul dan Bersinar"</div>
                        
                        <div class="vm-label">Misi</div>
                        <div class="vm-text">
                            <ul class="misi-list">
                                <li>Meningkatkan kualitas SDM yang andal, kompetitif, dan berbudaya.</li>
                                <li>Mempercepat pembangunan infrastruktur yang merata.</li>
                                <li>Mewujudkan reformasi birokrasi yang bersih dan melayani.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="news-section-header">
            <h2 class="news-main-title">Informasi Terkini</h2>
            <p class="text-muted">Update terbaru seputar kegiatan dan pengumuman Kabupaten Toba</p>
            
            <div class="news-tabs">
                <div class="news-tab-item active" id="tab-berita" onclick="switchTab('berita')">
                    <i class="far fa-newspaper"></i> Berita
                </div>
                <div class="news-tab-item" id="tab-pengumuman" onclick="switchTab('pengumuman')">
                    <i class="fas fa-bullhorn"></i> Pengumuman
                </div>
            </div>
        </div>

        <div id="content-berita" class="row g-4 fade-in">
            <div class="col-md-6">
                <div class="news-grid-card">
                    <div class="news-icon-box icon-blue">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="news-content">
                        <span class="news-category cat-blue">Pendidikan</span>
                        <a href="#" class="news-title">Pendaftaran Beasiswa Toba Cerdas 2025 Resmi Dibuka</a>
                        <p class="news-desc">Putra-putri terbaik Toba kini dapat mendaftar beasiswa prestasi. Cek syarat lengkapnya disini.</p>
                        <div class="news-meta">
                            <i class="far fa-calendar-alt"></i> 5 Juni 2025
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="news-grid-card">
                    <div class="news-icon-box icon-purple">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="news-content">
                        <span class="news-category cat-purple">Teknologi</span>
                        <a href="#" class="news-title">Launching "Toba Smart", Urus KTP Cukup dari HP</a>
                        <p class="news-desc">Disdukcapil Toba meluncurkan aplikasi baru untuk memangkas antrean administrasi.</p>
                        <div class="news-meta">
                            <i class="far fa-calendar-alt"></i> 3 Juni 2025
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content-pengumuman" class="row g-4 fade-in" style="display: none;">
            <div class="col-md-6">
                <div class="announce-grid-card">
                    <div class="news-icon-box icon-announce-orange">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="news-content">
                        <span class="news-category cat-announce-orange">Penting</span>
                        <a href="#" class="news-title">Perubahan Jam Operasional Kantor Bupati</a>
                        <p class="news-desc">Sehubungan dengan cuti bersama, pelayanan tatap muka akan ditutup sementara.</p>
                        <div class="news-meta">
                            <i class="far fa-calendar-alt"></i> 24-26 Des 2025
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="announce-grid-card">
                    <div class="news-icon-box icon-announce-green">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="news-content">
                        <span class="news-category cat-announce-green">Kesehatan</span>
                        <a href="#" class="news-title">Jadwal Pekan Imunisasi Nasional (PIN) Polio</a>
                        <p class="news-desc">Dimohon kepada seluruh warga untuk membawa balita ke Posyandu terdekat.</p>
                        <div class="news-meta">
                            <i class="far fa-calendar-alt"></i> 15-20 Juni 2025
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container doc-section">
        <div class="doc-header">
            <h2 class="doc-title" style="color: #1e3a8a; font-weight: 700;">Dokumentasi Kegiatan</h2>
            <p class="text-muted">Galeri foto kegiatan pemerintah dan masyarakat Kabupaten Toba</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('images/dokumentasi kegiatan.jpg') }}" alt="Kegiatan 1" class="doc-img">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/dokumentasi kegiatan (2).jpg') }}" alt="Kegiatan 2" class="doc-img">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/tarian.jpg') }}" alt="Tarian" class="doc-img">
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Footer" class="footer-logo">
                    <h5 class="fw-bold mb-3">PEMKAB TOBA</h5>
                    <p class="text-white-50" style="line-height: 1.8;">
                        Portal informasi terintegrasi untuk transparansi dan pelayanan publik yang lebih baik di seluruh wilayah Kabupaten Toba.
                    </p>
                </div>
                <div class="col-md-3 offset-md-4">
                    <h5 class="fw-bold mb-4">Hubungi Kami</h5>
                    <ul class="list-unstyled text-white-50" style="line-height: 2;">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Balige, Sumatera Utara</li>
                        <li><i class="fas fa-phone me-2"></i> +62 632 123456</li>
                        <li><i class="fas fa-envelope me-2"></i> info@tobakab.go.id</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1); margin-top: 50px;">
            <div class="text-center small text-white-50">
                &copy; 2025 Pemerintah Kabupaten Toba. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function switchTab(category) {
            const contentBerita = document.getElementById('content-berita');
            const contentPengumuman = document.getElementById('content-pengumuman');
            const tabBerita = document.getElementById('tab-berita');
            const tabPengumuman = document.getElementById('tab-pengumuman');

            if (category === 'berita') {
                contentBerita.style.display = 'flex';
                contentPengumuman.style.display = 'none';
                tabBerita.classList.add('active');
                tabPengumuman.classList.remove('active');
            } else {
                contentBerita.style.display = 'none';
                contentPengumuman.style.display = 'flex';
                tabPengumuman.classList.add('active');
                tabBerita.classList.remove('active');
            }
        }
    </script>
</body>
</html>