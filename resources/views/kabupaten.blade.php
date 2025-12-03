<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Kabupaten Toba</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* CSS PERSIS DARI ANDA + Sedikit Penambahan untuk Fungsionalitas Kalender */
        :root{
            --primary: #0b79b8;
            --primary-light: #0e8dd1;
            --muted: #64748b;
            --text: #0f172a;
            --bg: #f8fafc;
            --card: #ffffff;
            --border: rgba(15,23,42,0.08);
            --max-w: 1200px;
            --radius: 16px;
            --shadow: 0 1px 3px rgba(15,23,42,0.08), 0 1px 2px rgba(15,23,42,0.06);
            --shadow-lg: 0 10px 15px -3px rgba(15,23,42,0.08), 0 4px 6px -2px rgba(15,23,42,0.05);
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Poppins", system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        /* Navigation */
        .site-nav {
            height: 80px; display: flex; align-items: center; background: #fff; border-bottom: 1px solid var(--border);
            position: sticky; top: 0; z-index: 100; box-shadow: 0 1px 2px rgba(0,0,0,0.04);
        }
        .navbar-container { max-width: var(--max-w); margin: 0 auto; padding: 0 32px; display:flex; align-items:center; gap:24px; width:100% }
        .brand img { height: 48px; }
        .nav-menu { display:flex; gap:8px; margin:0 auto; list-style:none }
        .nav-menu a { display:inline-block; padding:10px 20px; border-radius:10px; color:var(--muted); font-weight:600; font-size:15px; text-decoration:none; transition:all .2s }
        .nav-menu a.active { background: rgba(11,121,184,0.1); color:var(--primary) }

        /* Hero */
        .hero {
            background-image: linear-gradient(135deg, rgba(11,79,110,0.8), rgba(11,121,184,0.7)), url("{{ asset('images/danau-toba.jpg') }}");
            background-size: cover; background-position: center; color: #fff; padding: 80px 32px 120px;
            text-align: center; position: relative;
        }
        .hero::after { content:''; position:absolute; bottom:0; left:0; right:0; height:100px; background: linear-gradient(to bottom, transparent, var(--bg)); }
        .hero .wrap { max-width:900px; margin:0 auto; position:relative; z-index:1 }
        .hero h1 { font-size:48px; margin:0 0 16px; font-weight:800; letter-spacing:-0.5px }
        .hero p { margin:0 0 32px; opacity:.95; font-size:18px; font-weight:500 }
        .hero-stats { display:flex; gap:64px; justify-content:center; margin-top:32px }
        .stat-item div:first-child { font-size:40px; font-weight:800; margin-bottom:4px }
        .stat-label { font-weight:500; font-size:14px; color: rgba(255,255,255,0.9) }

        /* Container */
        .container { max-width: var(--max-w); margin: 0 auto; padding: 0 32px; }
        .content { margin: -70px auto 48px; position: relative; z-index: 10; }

        .card { background: var(--card); border-radius: var(--radius); padding: 32px; box-shadow: var(--shadow-lg); border:1px solid var(--border); display:block }

        /* Two Column Layout */
        .two-column { display: grid; grid-template-columns: 1fr 400px; gap: 32px; align-items: stretch; }
        .two-column > article.card, .two-column > aside > .card { height: 100%; display: flex; flex-direction: column; }
        .sejarah-content { flex: 1 1 auto; min-height: 0; }
        
        /* Typography */
        h2 { font-size: 28px; font-weight:700; margin:0 0 20px }
        h3 { font-size:20px; font-weight:700; margin:0 0 16px }
        .muted { color: var(--muted); line-height:1.7 }

        /* Bupati cards */
        .bupati-cards { display: grid; grid-template-columns: 1fr 1fr; gap:16px; margin-top:8px }
        .bupati-card { background: linear-gradient(135deg,#f8fafc 0%, #ffffff 100%); border-radius: 14px; padding: 24px 16px; text-align:center; box-shadow: var(--shadow); border:1px solid var(--border); }
        .bupati-photo { width:110px; height:110px; object-fit:cover; border-radius:50%; margin:0 auto 16px; border:4px solid #e0f2fe; box-shadow:0 4px 12px rgba(11,121,184,0.15) }
        .bupati-card > div:nth-child(2) { font-weight:700; margin-bottom:4px; font-size:15px }
        .bupati-card .muted { font-size:13px }

        /* Visi Misi */
        .visi-misi-section { margin-top: 32px; }
        .visi-misi { display:grid; grid-template-columns: 1fr 1fr; gap:24px }
        .visi-misi .box { background: linear-gradient(135deg,#f0f9ff 0%, #ffffff 100%); padding:24px; border-radius:12px; border:1px solid rgba(11,121,184,0.1); height:100% }
        .visi-misi .box strong { display:block; margin-bottom:12px; color:var(--primary); font-size:16px }
        .visi-misi .box ul { margin:0; padding-left:20px; color:#475569 }
        .visi-misi .box li { margin-bottom:8px }

        /* Section Title */
        .section-title { font-size:32px; font-weight:700; color:var(--text); text-align:center; margin:64px 0 32px }

        /* News & Agenda Area */
        .news-area { display:grid; grid-template-columns: 1fr 480px; gap:32px; align-items:start }
        .news-column { display:flex; flex-direction:column; gap:24px }

        /* Tabs */
        .tabs { display:flex; gap:12px; margin-bottom:24px }
        .tab { background:#f1f5f9; padding:12px 24px; border-radius:10px; border:none; cursor:pointer; color:var(--muted); font-weight:600; font-size:15px; transition:all .2s }
        .tab.active { background:var(--primary); color:#fff; box-shadow: 0 4px 12px rgba(11,121,184,0.3) }

        /* News List */
        .news-list { display:flex; flex-direction:column; gap:16px }
        .news-item { background:#fff; border-radius:14px; padding:20px; border:1px solid var(--border); transition:all .2s }
        .news-item:hover { box-shadow: var(--shadow-lg); transform:translateY(-2px) }
        .news-meta { display:flex; gap:12px; align-items:center; font-size:13px; color:var(--muted); margin-bottom:12px }
        .tag { background: rgba(11,121,184,0.1); color:var(--primary); padding:6px 14px; border-radius:8px; font-weight:700; font-size:12px }
        .news-item h3 { font-size:17px; margin:0 0 8px; line-height:1.5 }
        .news-item p { margin:0; font-size:14px; line-height:1.6 }

        /* Calendar */
        .calendar { background: linear-gradient(135deg,#f8fafc 0%, #ffffff 100%); border-radius:14px; padding:28px 20px 28px 20px; border:1px solid var(--border); position: relative; min-height: 230px; }
        
        .cal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
        .cal-header h4 { font-weight:700; font-size:18px; color:var(--text); margin: 0; }
        .cal-nav button { background: none; border: none; cursor: pointer; color: var(--primary); font-size: 16px; padding: 4px 8px; border-radius: 6px; transition: background .15s; }
        .cal-nav button:hover { background: rgba(11,121,184,0.1); }
        
        .cal-grid { display:grid; grid-template-columns: repeat(7,1fr); gap:8px; font-size:14px }
        .cal-day { 
            padding:8px; border-radius:8px; text-align:center; color:var(--text); background:transparent; 
            border:1px solid transparent; cursor:pointer; font-weight:700; transition:all .15s; 
            position: relative; z-index: 1; font-size:13px; line-height: 1.1; 
        }
        .cal-day:not(.muted):hover { background: rgba(11,121,184,0.08); border-color: rgba(11,121,184,0.2) }
        .cal-day.muted { color:#94a3b8; cursor:default; font-weight:700 }
        .cal-day.today { background: linear-gradient(135deg, rgba(11,121,184,0.12), rgba(11,121,184,0.06)); color:var(--primary); font-weight:800 }
        .cal-day.selected { background: var(--primary); color: white; font-weight:800; box-shadow: 0 4px 8px rgba(11,121,184,0.14); z-index: 2; }
        
        /* Indikator Event (Titik Biru) */
        .cal-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background: var(--primary);
            border-radius: 50%;
        }

        .events { display:flex; flex-direction:column; gap:16px; margin-top:20px; }
        .event-card { background:#fff; padding:20px; border-radius:14px; border:1px solid var(--border); position:relative; transition:all .2s }
        .event-card:hover { box-shadow: var(--shadow-lg); transform:translateY(-2px) }
        .event-date { font-size:13px; color:var(--muted); margin-bottom:8px; font-weight:600 }
        .event-title { font-weight:700; margin-bottom:8px; font-size:17px; line-height:1.5; padding-right:100px }
        .event-meta { font-size:13px; color:#64748b }
        .event-status { position:absolute; right:20px; top:20px; padding:6px 12px; border-radius:8px; font-size:11px; font-weight:700; color:#fff; text-transform:uppercase; letter-spacing:.5px }
        /* Warna Status Baru */
        .status-upcoming { background:#06b6d4 } /* Biru Muda: Mendatang */ 
        .status-ongoing { background:#f97316 } /* Oranye: Sedang Berlangsung */
        .status-past { background:#9ca3af } /* Abu-abu: Selesai */
        .no-events { text-align:center; padding:24px; border-radius:14px; background:#fff; border:2px dashed var(--border); color:var(--muted) }

        /* Docs & Footer */
        .attachment { /* Gaya untuk link dokumen APBD */
            display: flex; align-items: center; gap: 12px; padding: 16px; border: 1px solid var(--border); border-radius: 12px;
            text-decoration: none; color: var(--text); font-weight: 600; transition: background .2s;
        }
        .attachment:hover { background: #f8fafc; }
        .attachment svg { width: 20px; height: 20px; color: var(--primary); }
        .docs { margin:80px auto 80px }
        .docs h2 { text-align:center; margin:0 0 32px; font-size:32px }
        .docs-track { display:flex; gap:20px; justify-content:center; flex-wrap:wrap; padding:8px; max-width:1200px; margin:0 auto }
        .doc-item { flex:0 0 360px; border-radius:16px; overflow:hidden; background:#fff; box-shadow:var(--shadow-lg); transition:all .3s }
        .doc-item:hover { transform:translateY(-8px); box-shadow: 0 20px 25px -5px rgba(15,23,42,0.1), 0 10px 10px -5px rgba(15,23,42,0.04) }
        .doc-item img { width:100%; height:220px; object-fit:cover; display:block }

        footer { background: linear-gradient(135deg,#1e293b 0%, #0f172a 100%); color:#cbd5e1; padding:60px 32px 32px }
        .footer-inner { max-width: var(--max-w); margin:0 auto; display:grid; grid-template-columns:2fr 1fr 1fr; gap:48px; margin-bottom:32px }
        .footer-inner h4 { color:#fff; margin:0 0 16px; font-size:16px; font-weight:700 }
        .footer-small { color:#94a3b8; font-size:14px; line-height:1.8 }
        .footer-copyright { text-align:center; color:#64748b; font-size:13px; padding-top:32px; border-top:1px solid rgba(255,255,255,0.1) }
        .footer-logo { display:flex; gap:12px; align-items:center; margin-bottom:20px }
        .footer-logo img { height:40px }
        .social-links a { color:#cbd5e1; font-size:24px; margin-right:12px }
        .social-links svg { width:20px; height:20px; fill:currentColor }

        /* Responsive */
        @media (max-width:1100px) {
            .two-column { grid-template-columns: 1fr 360px }
            .news-area { grid-template-columns: 1fr 420px }
        }
        @media (max-width:900px) {
            .two-column, .news-area { grid-template-columns: 1fr }
            .visi-misi { grid-template-columns: 1fr }
            .hero { padding-bottom: 100px }
            .two-column > article.card, .two-column > aside > .card { height: auto; }
        }
        @media (max-width:640px) {
            .container { padding: 0 20px }
            .navbar-container { padding: 0 20px }
            .hero h1 { font-size:32px }
            .hero p { font-size:16px }
            .card { padding:24px }
            .bupati-cards { grid-template-columns:1fr }
            .visi-misi { grid-template-columns:1fr }
            .cal-day { padding:8px 6px; font-size:12px }
            .doc-item { flex: 0 0 100%; max-width: 320px }
            .docs-track { justify-content:center }
        }
    </style>
</head>
<body>
    @php
    $simulated_events = [
        '2025-12-03' => [
            (object)['title' => 'Rapat Paripurna Penutupan Tahun', 'location' => 'Gedung DPRD', 'time_start' => '14:00', 'time_end' => '18:00'],
            (object)['title' => 'Pelatihan UMKM Go Digital', 'location' => 'Aula Kantor Bupati', 'time_start' => '09:00', 'time_end' => '12:00'],
        ],
        '2025-12-06' => [
            (object)['title' => 'Festival Budaya Danau Toba', 'location' => 'Pantai Lumban Silintong', 'time_start' => '10:00', 'time_end' => '20:00'],
        ],
        '2025-12-15' => [
            (object)['title' => 'Upacara Hari Jadi Kabupaten', 'location' => 'Lapangan Sisingamangaraja', 'time_start' => '08:00', 'time_end' => '11:00'],
        ],
        '2025-11-20' => [
            (object)['title' => 'Bakti Sosial Pesisir', 'location' => 'Desa Wisata', 'time_start' => '15:00', 'time_end' => '18:00'],
        ],
    ];
    @endphp

    <nav class="site-nav" role="navigation" aria-label="Utama">
        <div class="navbar-container">
            <a class="brand" href="/" aria-label="Beranda Toba Hita">
                <img src="{{ asset('images/logo.png') }}" alt="logo Kabupaten Toba">
            </a>
            <ul class="nav-menu" role="menubar" aria-label="Utama">
                <li><a href="/">Beranda</a></li>
                <li><a href="/profile" class="active">Profil Kabupaten</a></li>
                <li><a href="/daftardesa" class="">Daftar Desa</a></li>
            </ul>
        </div>
    </nav>

    <header class="hero" role="banner" aria-label="Hero">
        <div class="wrap">
            <h1>Profil Kabupaten Toba</h1>
            <p>Jantung Budaya Batak di Pesisir Danau Toba</p>

            <div class="hero-stats" aria-hidden="true">
                <div class="stat-item">
                    <div>{{ isset($total_kecamatan) ? $total_kecamatan : 16 }}</div>
                    <div class="stat-label">Kecamatan</div>
                </div>
                <div class="stat-item">
                    <div>{{ isset($total_penduduk) ? number_format($total_penduduk) : number_format(153831) }}</div>
                    <div class="stat-label">Penduduk</div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="content">
            <div class="two-column">
                
                <article class="card sejarah-card" aria-labelledby="sejarah-heading">
                    <div class="sejarah-content">
                        <h2 id="sejarah-heading">Sejarah Singkat</h2>
                        <p class="muted">Kabupaten Toba Samosir dibentuk berdasar UU No. 12 Tahun 1998. Kabupaten ini resmi berdiri pada 8 Maret 1999. Kawasan ini memiliki sejarah panjang dan kaya budaya Batak dengan perkembangan administratif sejak era reformasi.</p>
                        <p style="margin-top:18px" class="muted">
                            Sejak pembentukannya, Toba terus bertransformasi. Kini, fokus utama pemerintahan adalah pada pengembangan pariwisata super prioritas, infrastruktur digital, serta pemberdayaan masyarakat desa melalui program-program inovatif.
                        </p>
                        <p style="margin-top:18px" class="muted">
                            Latar belakang sejarah yang kuat menjadi modal dasar untuk pembangunan daerah yang berkelanjutan dan modern, dengan tetap menjaga kearifan lokal.
                        </p>
                    </div>
                </article>

                <aside>
                    <div class="card" aria-label="Bupati dan Wakil">
                        <h3>Bupati & Wakil Bupati</h3>
                        <div class="bupati-cards">
                            <div class="bupati-card">
                                <img class="bupati-photo" src="{{ asset('images/bupati.jpg') }}" alt="Bupati">
                                <div>Drs. Poltak Sitorus</div>
                                <div class="muted">Bupati</div>
                            </div>
                            <div class="bupati-card">
                                <img class="bupati-photo" src="{{ asset('images/wakil-bupati.jpg') }}" alt="Wakil Bupati">
                                <div>Andi Napitupulu Siahaan</div>
                                <div class="muted">Wakil Bupati</div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            
            <div class="card visi-misi-section">
                <h3>Visi & Misi</h3>
                <div class="visi-misi">
                    <div class="box"><strong>Visi</strong><p class="muted">Toba Unggul dan Bersinar</p></div>
                    <div class="box"><strong>Misi</strong><ul><li>Meningkatkan kualitas sumber daya manusia.</li><li>Memperkuat tata kelola pemerintahan yang transparan.</li><li>Mendorong ekonomi berbasis pariwisata dan kearifan lokal.</li></ul></div>
                </div>
            </div>
        </section>

        <section>
            <div class="section-title">Apa yang Baru di Kabupaten Toba?</div>

            <div class="news-area">
                <div class="news-column">
                    <div class="card">
                        <div class="tabs" role="tablist" aria-label="Filter berita">
                            <button class="tab active" data-type="berita" role="tab" aria-selected="true" onclick="filterNews('berita')">Berita</button>
                            <button class="tab" data-type="pengumuman" role="tab" aria-selected="false" onclick="filterNews('pengumuman')">Pengumuman</button>
                        </div>

                        <div class="news-list" id="newsList">
                            <article class="news-item" data-type="berita">
                                <div class="news-meta"><span class="tag">Pendidikan</span><time datetime="2025-06-05" style="margin-left:auto">5 Juni 2025</time></div>
                                <h3>Pembukaan Pendaftaran Program Beasiswa Kabupaten Toba 2025</h3>
                                <p class="muted">Pendaftaran beasiswa untuk siswa berprestasi dibuka. Detail tata cara tersedia di laman layanan pendidikan.</p>
                            </article>
                            <article class="news-item" data-type="berita">
                                <div class="news-meta"><span class="tag">Teknologi</span><time datetime="2025-06-03" style="margin-left:auto">3 Juni 2025</time></div>
                                <h3>Launching Aplikasi Mobile Layanan Publik Digital</h3>
                                <p class="muted">Aplikasi memudahkan warga mengakses layanan publik melalui smartphone.</p>
                            </article>
                            <article class="news-item" data-type="pengumuman" style="display:none">
                                <div class="news-meta" style="color:#d97706;"><span class="tag" style="background:#fff7ed; color:#d97706;">PENTING</span><time datetime="2025-05-28" style="margin-left:auto">28 Mei 2025</time></div>
                                <h3>Pemeliharaan Jalan Provinsi</h3>
                                <p class="muted">Jadwal pemeliharaan jalan utama diumumkan untuk mitigasi dampak lalu lintas.</p>
                            </article>
                        </div>

                        <div style="margin-top:20px; text-align:center">
                            <a href="/news" style="color:var(--primary); font-weight:700; text-decoration:none">Lihat Semua Berita</a>
                        </div>
                    </div>
                    
                    <div class="card">
                        <h3>Transparansi Anggaran Desa</h3>
                        <a class="attachment" href="/files/APBD-2025.pdf" target="_blank" rel="noopener noreferrer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M6 2h7l5 5v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM13 3.5V9h5.5L13 3.5z"/></svg>
                            <div>APBD 2025 (PDF)</div>
                        </a>
                    </div>
                </div>

                <aside>
                    <div class="card">
                        <h3>Agenda Pemkot</h3>
                        
                        <div class="calendar" aria-label="Kalender agenda">
                            <div class="cal-header">
                                <div class="cal-nav">
                                    <button id="prevMonth" aria-label="Bulan Sebelumnya"><i class="fas fa-chevron-left"></i></button>
                                </div>
                                <h4 id="currentMonthYear"></h4>
                                <div class="cal-nav">
                                    <button id="nextMonth" aria-label="Bulan Berikutnya"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                            
                            <div class="day-labels">
                                <div class="cal-day muted" style="padding:0">Min</div><div class="cal-day muted" style="padding:0">Sen</div><div class="cal-day muted" style="padding:0">Sel</div>
                                <div class="cal-day muted" style="padding:0">Rab</div><div class="cal-day muted" style="padding:0">Kam</div><div class="cal-day muted" style="padding:0">Jum</div><div class="cal-day muted" style="padding:0">Sab</div>
                            </div>
                            
                            <div id="calendarDates" class="cal-grid">
                                </div>
                        </div>

                        <div class="events" id="eventsList" aria-live="polite">
                            @if(isset($upcoming_agendas))
                                @foreach($upcoming_agendas as $agenda)
                                    <div class="event-card" data-datetime="{{ $agenda->date }}T{{ $agenda->time_start }}">
                                        <div class="event-date">Akan Datang</div>
                                        <div class="event-title">{{ $agenda->title }}</div>
                                        <div class="event-meta"><i class="fas fa-map-marker-alt"></i> {{ $agenda->location }}</div>
                                        <span class="event-status status-upcoming" aria-hidden="true">Akan Datang</span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="no-events" id="noEventsMessage" @if(isset($upcoming_agendas) && count($upcoming_agendas) > 0) style="display:none;" @endif>Pilih tanggal di kalender untuk melihat agenda.</div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <section class="docs" aria-label="Dokumentasi Kegiatan">
            <h2>Dokumentasi Kegiatan</h2>
            <div class="docs-track">
                <div class="doc-item"><img src="{{ asset('images/dokumentasi kegiatan.jpg') }}" alt="Dokumentasi 1"></div>
                <div class="doc-item"><img src="{{ asset('images/dokumentasi kegiatan (2).jpg') }}" alt="Dokumentasi 2"></div>
                <div class="doc-item"><img src="{{ asset('images/tarian.jpg') }}" alt="Dokumentasi 3"></div>
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
                <div class="footer-meta">© <span id="year"></span> Pemerintah Kabupaten Toba. Hak Cipta Dilindungi.</div>
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
        // Data Agenda dari Controller (Simulasi Blade/PHP ke JS)
        const AGENDA_DATA = @json($simulated_events);
        
        // 1. Script News Tab Filtering
        function filterNews(type) {
            const tabs = Array.from(document.querySelectorAll('.tab'));
            const newsList = document.getElementById('newsList');
            tabs.forEach(t=>{ 
                t.classList.remove('active'); 
                t.setAttribute('aria-selected','false'); 
                if (t.dataset.type === type) { t.classList.add('active'); t.setAttribute('aria-selected','true'); }
            });
            
            const items = Array.from(newsList.querySelectorAll('[data-type]'));
            items.forEach(it => {
                it.style.display = (it.dataset.type !== type) ? 'none' : 'block';
            });
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('year').textContent = new Date().getFullYear();

            // 2. Script Kalender Dinamis
            const today = new Date();
            let currentDisplayDate = new Date(today.getFullYear(), today.getMonth(), 1); 
            
            const calendarDates = document.getElementById('calendarDates');
            const currentMonthYearEl = document.getElementById('currentMonthYear');
            const prevBtn = document.getElementById('prevMonth');
            const nextBtn = document.getElementById('nextMonth');
            const eventsList = document.getElementById('eventsList');
            const noEventsMessage = document.getElementById('noEventsMessage');

            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            
            const pad = n => String(n).padStart(2,'0');
            const ymd = d => `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;
            const ymdh = (d, h) => `${d}T${h}:00`;

            function getStatus(eventDateStr, startTimeStr, endTimeStr) {
                const now = new Date();
                const eventDate = new Date(eventDateStr);
                
                // Set waktu awal dan akhir event pada tanggal event tersebut
                const startDateTime = new Date(`${eventDateStr}T${startTimeStr}`);
                const endDateTime = new Date(`${eventDateStr}T${endTimeStr}`);

                // Cek apakah event sedang berlangsung
                if (now >= startDateTime && now <= endDateTime) {
                    return { text: 'Sedang Berlangsung', class: 'status-ongoing' };
                } 
                // Cek apakah event sudah selesai
                else if (now > endDateTime) {
                    return { text: 'Selesai', class: 'status-past' };
                }
                // Jika tidak, event adalah mendatang
                else {
                    return { text: 'Mendatang', class: 'status-upcoming' };
                }
            }

            function renderAgendas(dateStr, agendas) {
                eventsList.innerHTML = '';
                if (!agendas || agendas.length === 0) {
                    noEventsMessage.style.display = 'block';
                    return;
                }
                noEventsMessage.style.display = 'none';

                agendas.forEach(agenda => {
                    const status = getStatus(dateStr, agenda.time_start, agenda.time_end);
                    const html = `
                        <div class="event-card">
                            <div class="event-date">${new Date(dateStr).toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'})} • ${agenda.time_start} - ${agenda.time_end}</div>
                            <div class="event-title">${agenda.title}</div>
                            <div class="event-meta"><i class="fas fa-map-marker-alt"></i> ${agenda.location}</div>
                            <span class="event-status ${status.class}" aria-hidden="true">${status.text}</span>
                        </div>
                    `;
                    eventsList.insertAdjacentHTML('beforeend', html);
                });
            }

            function renderCalendar() {
                const year = currentDisplayDate.getFullYear();
                const month = currentDisplayDate.getMonth();
                const firstDayIndex = new Date(year, month, 1).getDay(); // 0 (Sun) - 6 (Sat)
                const lastDay = new Date(year, month + 1, 0).getDate();
                const prevLastDay = new Date(year, month, 0).getDate();

                currentMonthYearEl.innerText = `${monthNames[month]} ${year}`;
                calendarDates.innerHTML = '';
                
                let daysHtml = "";

                // Tanggal dari bulan sebelumnya
                for (let x = firstDayIndex; x > 0; x--) {
                    daysHtml += `<button class="cal-day muted" type="button">${prevLastDay - x + 1}</button>`;
                }

                // Tanggal bulan ini
                for (let i = 1; i <= lastDay; i++) {
                    const monthStr = pad(month + 1);
                    const dayStr = pad(i);
                    const fullDate = `${year}-${monthStr}-${dayStr}`;
                    
                    let classes = "";
                    if (fullDate === ymd(today)) classes += "today";
                    
                    // Cek apakah tanggal ini punya event
                    if (AGENDA_DATA[fullDate] && AGENDA_DATA[fullDate].length > 0) {
                        classes += " has-event";
                    }

                    daysHtml += `<button class="cal-day ${classes}" data-date="${fullDate}" type="button">${i}</button>`;
                }

                calendarDates.innerHTML = daysHtml;

                // Event Listeners untuk tanggal
                document.querySelectorAll('.cal-day:not(.muted)').forEach(el => {
                    el.addEventListener('click', function() {
                        // Hilangkan "selected" dari semua
                        document.querySelectorAll('.cal-day').forEach(d => d.classList.remove('selected'));
                        
                        // Tambahkan "selected" ke yang diklik
                        this.classList.add('selected');

                        // Panggil fungsi render agenda
                        const dateStr = this.dataset.date;
                        renderAgendas(dateStr, AGENDA_DATA[dateStr]);
                    });
                });
                
                // Otomatis klik tanggal hari ini saat pertama kali load
                const todayEl = document.querySelector('.cal-day.today');
                if (todayEl) {
                    todayEl.click();
                } else {
                    // Jika bulan saat ini tidak sama dengan bulan hari ini, tampilkan pesan default
                    renderAgendas(null, null); 
                }
            }

            // Navigation Events
            prevBtn.addEventListener('click', () => {
                currentDisplayDate.setMonth(currentDisplayDate.getMonth() - 1);
                renderCalendar();
            });

            nextBtn.addEventListener('click', () => {
                currentDisplayDate.setMonth(currentDisplayDate.getMonth() + 1);
                renderCalendar();
            });

            // Inisialisasi Kalender
            renderCalendar();
        });
    </script>
</body>
</html>