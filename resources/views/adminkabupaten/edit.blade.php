<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Informasi - Admin Kabupaten</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* CSS DARI ANDA (DIPERTAHANKAN) */
        * { font-family: 'Poppins', sans-serif; }
        body { background-color: #f8f9fa; overflow-x: hidden; }
        .sidebar { min-height: 100vh; background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%); position: fixed; left: 0; top: 0; width: 250px; z-index: 100; }
        .sidebar-header { padding: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-header h4 { color: white; font-weight: 600; margin: 0; }
        .sidebar-menu { padding: 1rem 0; }
        .sidebar-menu .nav-link { color: rgba(255,255,255,0.8); padding: 0.75rem 1.5rem; transition: all 0.3s; border-radius: 0; }
        .sidebar-menu .nav-link:hover, .sidebar-menu .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; }
        .sidebar-footer { position: absolute; bottom: 0; width: 100%; padding: 1rem; border-top: 1px solid rgba(255,255,255,0.1); }
        
        .main-content { margin-left: 250px; padding: 2rem; }
        .section-card { background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 2rem; margin-bottom: 2rem; }
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .section-title { font-weight: 700; color: #2c3e50; font-size: 1.5rem; margin: 0; }
        .btn-add { background: #3498db; color: white; border: none; padding: 0.6rem 1.5rem; border-radius: 5px; font-weight: 500; transition: all 0.3s; }
        .btn-add:hover { background: #2980b9; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(52,152,219,0.3); }
        
        .tab-navigation { border-bottom: 2px solid #e9ecef; margin-bottom: 2rem; }
        .tab-nav-link { padding: 0.75rem 2rem; color: #6c757d; text-decoration: none; display: inline-block; border-bottom: 3px solid transparent; transition: all 0.3s; font-weight: 500; }
        .tab-nav-link.active { color: #3498db; border-bottom-color: #3498db; }
        
        .news-item { background: #f8f9fa; border-radius: 8px; padding: 1.5rem; margin-bottom: 1rem; border-left: 4px solid #3498db; }
        .news-category { display: inline-block; background: #e9ecef; color: #495057; padding: 0.25rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.5rem; }
        .news-title { font-weight: 600; color: #2c3e50; margin: 0.5rem 0; font-size: 1.1rem; }
        .news-excerpt { color: #6c757d; margin: 0.5rem 0; font-size: 0.95rem; }
        .news-meta { display: flex; gap: 1rem; color: #6c757d; font-size: 0.875rem; margin-top: 0.75rem; }
        .btn-icon { background: transparent; border: none; color: #6c757d; padding: 0.5rem 0.75rem; border-radius: 4px; transition: all 0.3s; }
        .btn-icon:hover { background: #e9ecef; color: #2c3e50; }
        
        .calendar-card { background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 1.5rem; }
        .calendar-header { text-align: center; font-weight: 600; color: #2c3e50; margin-bottom: 1rem; font-size: 1.1rem; }
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; }
        .calendar-day-header { text-align: center; font-weight: 500; color: #6c757d; font-size: 0.875rem; padding: 0.5rem; }
        .calendar-day { aspect-ratio: 1; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: #495057; font-weight: 500; cursor: pointer; transition: all 0.3s; }
        
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); padding: 20px; }
        .modal.show { display: flex; align-items: center; justify-content: center; }
        .modal-dialog { background: white; border-radius: 10px; width: 90%; max-width: 600px; margin: 0 auto; position: relative; }
        .modal-header { padding: 1.5rem; border-bottom: 1px solid #e9ecef; display: flex; justify-content: space-between; align-items: center; }
        .modal-title { font-weight: 600; color: #2c3e50; font-size: 1.25rem; margin: 0; }
        .btn-close { background: transparent; border: none; font-size: 1.5rem; color: #6c757d; cursor: pointer; }
        .modal-body { padding: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-label { font-weight: 500; color: #2c3e50; margin-bottom: 0.5rem; display: block; }
        .form-control, .form-select { width: 100%; padding: 0.75rem; border: 1px solid #dee2e6; border-radius: 5px; font-size: 0.95rem; transition: all 0.3s; }
        .btn-secondary { background: #6c757d; color: white; border: none; padding: 0.6rem 1.5rem; border-radius: 5px; cursor: pointer; }
        .btn-primary { background: #3498db; color: white; border: none; padding: 0.6rem 1.5rem; border-radius: 5px; cursor: pointer; }
        
        @media (max-width: 768px) {
            .sidebar { margin-left: -250px; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin Kabupaten</h4>
            <small class="text-white-50">Selamat datang, {{ Auth::user()->name ?? 'Admin' }}</small>
        </div>
        
        <div class="sidebar-menu">
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
                <a class="nav-link active" href="{{ route('admin.kabupaten.edit') }}">
                    <i class="fas fa-edit me-2"></i> Edit Profil Global
                </a>
                <a class="nav-link" href="{{ route('admin.agenda.index') ?? '#' }}">
                    <i class="fas fa-calendar-alt me-2"></i> Manajemen Agenda
                </a>
                <a class="nav-link" href="{{ route('admin.desa.create') ?? '#' }}">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Desa Baru
                </a>
            </nav>
        </div>
        
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-white bg-transparent border-0 w-100 text-start">
                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                </button>
            </form>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container-fluid">
            
            <h1 class="mb-4" style="font-weight: 800; font-size: 1.8rem; color: #2c3e50;">Manajemen Informasi</h1>

            <div class="section-card">
                <div class="section-header">
                    <h2 class="section-title">Berita & Pengumuman</h2>
                    <button class="btn-add" onclick="openModal()">
                        <i class="fas fa-plus me-2"></i> Tambah Konten
                    </button>
                </div>
                
                <div class="tab-navigation">
                    <a href="#" class="tab-nav-link active" onclick="showTab('berita', event)">
                        <i class="fas fa-newspaper me-2"></i> Berita
                    </a>
                    <a href="#" class="tab-nav-link" onclick="showTab('pengumuman', event)">
                        <i class="fas fa-bullhorn me-2"></i> Pengumuman
                    </a>
                </div>
                
                <div id="berita-content" class="tab-content">
                    <div class="news-list">
                        <div class="news-item">
                            <span class="news-category">Pendidikan</span>
                            <h3 class="news-title">Pembukaan Pendaftaran Program Beasiswa Kabupaten Toba 2025</h3>
                            <p class="news-excerpt">Pemerintah Kabupaten Toba membuka pendaftaran beasiswa untuk siswa berprestasi...</p>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 5 Juni 2025</span>
                                <span><i class="far fa-clock"></i> 10:30 WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-icon" title="Hapus"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="news-item">
                            <span class="news-category">Teknologi</span>
                            <h3 class="news-title">Launching Aplikasi Mobile Layanan Publik Digital</h3>
                            <p class="news-excerpt">Aplikasi baru memudahkan warga mengakses layanan publik melalui smartphone...</p>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 3 Juni 2025</span>
                                <span><i class="far fa-clock"></i> 14:00 WIB</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-icon" title="Hapus"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="pengumuman-content" class="tab-content" style="display: none;">
                    <div class="news-list">
                         <div class="news-item" style="border-left: 4px solid #f39c12; background: #fff8f0;">
                            <span class="news-category" style="background:#fef3c7; color:#f39c12;">Informasi Penting</span>
                            <h3 class="news-title">Pengumuman Libur Nasional dan Cuti Bersama</h3>
                            <p class="news-excerpt">Pemerintah Kabupaten Toba mengumumkan jadwal libur nasional dan cuti bersama tahun 2025...</p>
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> 1 Juni 2025</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-icon" title="Hapus"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section-card">
                <div class="section-header">
                    <h2 class="section-title">Manajemen Agenda</h2>
                    <button class="btn-add" onclick="openAgendaModal()">
                        <i class="fas fa-plus me-2"></i> Tambah Agenda
                    </button>
                </div>
                
                <p style="color: #6c757d; margin-bottom: 1.5rem;">
                    Kelola jadwal kegiatan yang ditampilkan di Kalender Profil Kabupaten.
                </p>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="calendar-card">
                            <div class="calendar-header">Juni 2025</div>
                            <div class="calendar-grid">
                                <div class="calendar-day-header">Min</div><div class="calendar-day-header">Sen</div><div class="calendar-day-header">Sel</div>
                                <div class="calendar-day-header">Rab</div><div class="calendar-day-header">Kam</div><div class="calendar-day-header">Jum</div><div class="calendar-day-header">Sab</div>
                            </div>
                            <div class="calendar-grid">
                                <div class="calendar-day">1</div><div class="calendar-day">2</div><div class="calendar-day">3</div><div class="calendar-day">4</div><div class="calendar-day">5</div><div class="calendar-day">6</div><div class="calendar-day today">7</div>
                                <div class="calendar-day has-event">8</div><div class="calendar-day">9</div><div class="calendar-day has-event">10</div><div class="calendar-day">11</div><div class="calendar-day">12</div><div class="calendar-day">13</div><div class="calendar-day">14</div>
                                <div class="calendar-day has-event">15</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8">
                        <h5 style="font-weight: 600; color: #2c3e50; margin-bottom: 1rem;">Daftar Agenda Mendatang</h5>
                        <div class="agenda-list">
                            <div class="agenda-item">
                                <span class="agenda-category">Rapat</span>
                                <h3 class="agenda-title">Rapat Koordinasi Pembangunan Infrastruktur</h3>
                                <div class="agenda-details">
                                    <div class="agenda-detail-item"><i class="far fa-calendar"></i> 8 Juni 2025</div>
                                    <div class="agenda-detail-item"><i class="far fa-clock"></i> 09:00 - 12:00 WIB</div>
                                </div>
                                <div class="news-actions mt-3">
                                    <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Hapus"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section-card">
                <div class="section-header">
                    <h2 class="section-title">Manajemen Laporan APBD</h2>
                    <button class="btn-add" onclick="openApbdModal()">
                        <i class="fas fa-file-upload me-2"></i> Upload APBD
                    </button>
                </div>
                
                <div class="apbd-section">
                    <div data-year="2025">
                        <div class="apbd-year">APBD 2025</div>
                        <div class="apbd-item">
                            <div class="apbd-label">
                                <i class="fas fa-file-pdf apbd-icon"></i>
                                <div>
                                    <div class="apbd-text">Lampiran APBD</div>
                                    <small style="color: #6c757d;">Realisasi Triwulan 1</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn-download"><i class="fas fa-download me-2"></i> Download</a>
                                <button class="btn-icon" title="Hapus"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div id="addNewsModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Tambah Berita Baru</h3>
                <button class="btn-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="newsForm">
                    <div class="form-group">
                        <label class="form-label">Tipe Konten</label>
                        <select class="form-select" id="contentType" onchange="updateModalTitle()">
                            <option value="berita">Berita</option>
                            <option value="pengumuman">Pengumuman</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" id="category">
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Informasi">Informasi</option>
                            <option value="Pelayanan">Pelayanan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" placeholder="Masukkan judul berita/pengumuman" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Isi Konten</label>
                        <textarea class="form-control textarea" id="content" placeholder="Masukkan isi berita/pengumuman" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Waktu</label>
                        <input type="time" class="form-control" id="time" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeModal()">Batal</button>
                <button class="btn-primary" onclick="saveNews()">Simpan</button>
            </div>
        </div>
    </div>
    
    <div id="addAgendaModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Agenda Baru</h3>
                <button class="btn-close" onclick="closeAgendaModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="agendaForm">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" id="agendaCategory">
                            <option value="Rapat">Rapat</option>
                            <option value="Dialog Publik">Dialog Publik</option>
                            <option value="Sosialisasi">Sosialisasi</option>
                            <option value="Kunjungan">Kunjungan</option>
                            <option value="Upacara">Upacara</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Judul Agenda</label>
                        <input type="text" class="form-control" id="agendaTitle" placeholder="Masukkan judul agenda" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="agendaDate" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Waktu Mulai</label>
                                <input type="time" class="form-control" id="agendaTimeStart" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Waktu Selesai</label>
                                <input type="time" class="form-control" id="agendaTimeEnd" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="agendaLocation" placeholder="Masukkan lokasi kegiatan" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Peserta</label>
                        <input type="text" class="form-control" id="agendaParticipants" placeholder="Contoh: Kepala Dinas & Walikota" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeAgendaModal()">Batal</button>
                <button class="btn-primary" onclick="saveAgenda()">Simpan</button>
            </div>
        </div>
    </div>
    
    <div id="addApbdModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">Upload File APBD</h3>
                <button class="btn-close" onclick="closeApbdModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="apbdForm">
                    <div class="form-group">
                        <label class="form-label">Tahun Anggaran</label>
                        <select class="form-select" id="apbdYear">
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Jenis Dokumen</label>
                        <input type="text" class="form-control" id="apbdType" placeholder="Contoh: Lampiran, Laporan Realisasi, dll" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Upload File (PDF)</label>
                        <input type="file" class="form-control" id="apbdFile" accept=".pdf" required>
                        <small style="color: #6c757d; display: block; margin-top: 0.5rem;">
                            Format file: PDF (Max. 10MB)
                        </small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="apbdDescription" placeholder="Masukkan deskripsi singkat" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeApbdModal()">Batal</button>
                <button class="btn-primary" onclick="saveApbd()">Upload</button>
            </div>
        </div>
    </div>
    
    <div id="editOfficialModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">Edit Pimpinan</h3>
                <button class="btn-close" onclick="closeOfficialModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="officialForm">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="officialName" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Upload Foto Baru</label>
                        <input type="file" class="form-control" id="officialPhoto" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Periode</label>
                        <input type="text" class="form-control" id="officialPeriod" placeholder="Contoh: 2021-2026">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeOfficialModal()">Batal</button>
                <button class="btn-primary" onclick="saveOfficial()">Simpan</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- DATA FLOW AND STATE ---
        // Asumsi variabel global untuk user login
        const loggedInUser = {
            name: "{{ Auth::user()->name ?? 'Admin' }}",
            role: "{{ Auth::user()->role ?? 'guest' }}"
        };

        // --- GLOBAL MODAL FUNCTIONS ---
        function toggleModal(id, open) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.toggle('show', open);
                modal.style.display = open ? 'flex' : 'none';
                document.body.style.overflow = open ? 'hidden' : 'auto';
            }
        }
        
        function openModal() { toggleModal('addNewsModal', true); updateModalTitle(); }
        function closeModal() { toggleModal('addNewsModal', false); document.getElementById('newsForm').reset(); }
        
        function openAgendaModal() { 
            toggleModal('addAgendaModal', true);
            const now = new Date();
            document.getElementById('agendaDate').valueAsDate = now;
            document.getElementById('agendaTimeStart').value = now.toTimeString().substring(0, 5);
            const endTime = new Date(now.getTime() + 3 * 60 * 60 * 1000);
            document.getElementById('agendaTimeEnd').value = endTime.toTimeString().substring(0, 5);
        }
        function closeAgendaModal() { toggleModal('addAgendaModal', false); document.getElementById('agendaForm').reset(); }

        function openApbdModal() { toggleModal('addApbdModal', true); }
        function closeApbdModal() { toggleModal('addApbdModal', false); document.getElementById('apbdForm').reset(); }
        
        function openOfficialModal() { toggleModal('editOfficialModal', true); }
        function closeOfficialModal() { toggleModal('editOfficialModal', false); }
        
        function updateModalTitle() {
            const contentType = document.getElementById('contentType').value;
            document.getElementById('modalTitle').textContent = contentType === 'berita' ? 'Tambah Berita Baru' : 'Tambah Pengumuman Baru';
        }
        
        // --- DUMMY SAVE FUNCTIONS (Client-side simulation for presentation) ---
        function saveNews() {
             const title = document.getElementById('title').value;
             if (!title) { alert('Mohon lengkapi judul!'); return; }
             // AJAX call to /admin/news/store would go here
             alert('Konten "'+title+'" siap dikirim ke Controller!');
             closeModal();
        }
        
        function saveAgenda() {
            const title = document.getElementById('agendaTitle').value;
             if (!title) { alert('Mohon lengkapi judul agenda!'); return; }
             // AJAX call to /admin/agendas/store would go here
             alert('Agenda "'+title+'" berhasil disimpan!');
             closeAgendaModal();
        }

        // --- TAB SWITCHING ---
        function showTab(tabName, event) {
            event.preventDefault();
            document.querySelectorAll('.tab-content').forEach(content => { content.style.display = 'none'; });
            document.querySelectorAll('.tab-nav-link').forEach(link => { link.classList.remove('active'); });
            
            document.getElementById(tabName + '-content').style.display = 'block';
            event.target.closest('.tab-nav-link').classList.add('active');
        }
        
        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial active state for News tab
            document.getElementById('berita-content').style.display = 'block';
            
            // Activate Edit buttons on Official cards (using the modal functions)
            document.querySelectorAll('.official-photo-card button').forEach(button => {
                button.setAttribute('onclick', 'openOfficialModal()');
            });
        });
    </script>
</body>
</html>