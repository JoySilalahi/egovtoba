<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kabupaten - Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
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
        .welcome-card { background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 2rem; margin-bottom: 2rem; }
        .welcome-card h2 { font-weight: 700; color: #2c3e50; margin-bottom: 1.5rem; }
        .vision-mission p { color: #6c757d; line-height: 1.8; margin-bottom: 1rem; }
        .vision-mission strong { color: #2c3e50; }
        
        .stat-card2 { display: flex; background: #fff; padding: 20px; border-radius: 12px; position: relative; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); align-items: center; }
        .left-border { width: 6px; background-color: #007bff; height: 80%; border-radius: 10px; margin-right: 15px; }
        .stat-icon2 i { font-size: 22px; color: #007bff; }
        .stat-label2 { font-size: 14px; color: #6c757d; margin-top: 4px; }
        .stat-value2 { font-size: 24px; font-weight: bold; margin-top: 8px; }
        
        .official-photo-card { background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden; height: 100%; }
        .official-photo { background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); height: 200px; display: flex; align-items: center; justify-content: center; }
        .official-photo i { font-size: 4rem; color: white; opacity: 0.5; }
        .official-info { padding: 1.25rem; text-align: center; }
        .official-info h5 { color: #2c3e50; font-weight: 600; margin-bottom: 0.25rem; font-size: 1rem; }
        .official-info p { color: #6c757d; margin-bottom: 0; font-size: 0.875rem; }
        
        .upload-card { background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 2rem; }
        .btn-upload { background: #3498db; color: white; border: none; padding: 0.5rem 2rem; border-radius: 5px; font-weight: 500; transition: all 0.3s; }
        .btn-upload:hover { background: #2980b9; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(52,152,219,0.3); }

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
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
                <a class="nav-link" href="{{ route('admin.kabupaten.edit') ?? '#' }}">
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
            <div class="welcome-card">
                <h2>Selamat Datang, Admin Kabupaten</h2>
                
                <div class="vision-mission">
                    <p><strong>Visi</strong> : Toba Unggul dan Bersinar</p>
                    <p><strong>Misi</strong> : Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.</p>
                </div>
                
                <div class="mt-4">
                    <h5 style="font-weight: 600; color: #2c3e50; margin-bottom: 1rem;">Ubah Visi dan Misi :</h5>
                    <form method="POST" action="#">
                         @csrf
                        <div class="mb-3">
                            <label for="visiInput" class="form-label" style="font-weight: 500;">Visi</label>
                            <input type="text" class="form-control" id="visiInput" value="Toba Unggul dan Bersinar">
                        </div>
                        <div class="mb-3">
                            <label for="misiInput" class="form-label" style="font-weight: 500;">Misi</label>
                            <textarea class="form-control" id="misiInput" rows="3">Meningkatkan kualitas sumber daya manusia yang andal dan berbudaya, mempercepat pembangunan infrastruktur, serta mewujudkan reformasi birokrasi yang bersih dan melayani.</textarea>
                        </div>
                        <button class="btn btn-primary">Publish Perubahan</button>
                    </form>
                </div>
            </div>
            
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="stat-card2">
                                <div class="left-border"></div>
                                <div class="content">
                                    <div class="stat-icon2"><i class="fas fa-users"></i></div>
                                    <div class="stat-label2">Total Penduduk</div>
                                    <div class="stat-value2">{{ number_format($total_penduduk) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="stat-card2">
                                <div class="left-border" style="background-color: #f39c12;"></div>
                                <div class="content">
                                    <div class="stat-icon2" style="color: #f39c12;"><i class="fas fa-info-circle"></i></div>
                                    <div class="stat-label2">Total Desa</div>
                                    <div class="stat-value2">{{ $total_desa }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="official-photo-card" style="position: relative;">
                                <button class="btn btn-sm btn-primary" style="position: absolute; top: 10px; right: 10px; z-index: 10; opacity: 0.7;" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <div class="official-photo">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="official-info">
                                    <h5>{{ $official_bupati->name }}</h5>
                                    <p>{{ $official_bupati->role }} Toba</p>
                                    <p>{{ $official_bupati->periode }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="official-photo-card" style="position: relative;">
                                <button class="btn btn-sm btn-primary" style="position: absolute; top: 10px; right: 10px; z-index: 10; opacity: 0.7;" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <div class="official-photo">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="official-info">
                                    <h5>{{ $official_wakil->name }}</h5>
                                    <p>{{ $official_wakil->role }} Toba</p>
                                    <p>{{ $official_wakil->periode }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-12">
                    <div class="upload-card">
                        <h4>Upload dokumentasi kegiatan</h4>
                        
                        <div class="upload-area" onclick="document.getElementById('fileInput').click();">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p class="mb-2"><strong>Pilih file</strong></p>
                            <p class="file-chosen" id="fileName">Belum ada file yang dipilih</p>
                        </div>
                        
                        <input type="file" id="fileInput" style="display: none;" onchange="updateFileName(this)">
                        
                        <button class="btn-upload mt-3" onclick="uploadFile()">
                            <i class="fas fa-upload me-2"></i> Unggah Foto Baru
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Logika untuk menampilkan nama file yang dipilih
        function updateFileName(input) {
            const fileName = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
            } else {
                fileName.textContent = 'Belum ada file yang dipilih';
            }
        }
        
        // Logika untuk tombol unggah
        function uploadFile() {
            const fileInput = document.getElementById('fileInput');
            if (fileInput.files && fileInput.files[0]) {
                alert('Mengunggah: ' + fileInput.files[0].name + '... (Logic backend perlu ditambahkan)');
            } else {
                alert('Silakan pilih file terlebih dahulu');
            }
        }
    </script>
</body>
</html>