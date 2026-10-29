<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <!-- Header di Luar Card -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-primary m-0">
                        <i class="bi bi-person-plus-fill me-2"></i>Tambah Peserta Baru
                    </h3>
                    <a href="{{ route('peserta.index') }}" class="btn btn-primary fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Tabel
                    </a>
                </div>

                <!-- Card Form dengan Header Biru -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="m-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Formulir Data Peserta</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('peserta.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">
                                    <i class="bi bi-person me-1"></i>NAMA LENGKAP
                                </label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">
                                    <i class="bi bi-building me-1"></i>INSTANSI / KAMPUS
                                </label>
                                <input type="text" name="instansi" class="form-control" placeholder="Contoh: Telkom University" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">
                                    <i class="bi bi-whatsapp me-1"></i>NO. WHATSAPP
                                </label>
                                <input type="text" name="kontak" class="form-control" placeholder="Contoh: 08123456789" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">
                                    <i class="bi bi-envelope me-1"></i>EMAIL
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="Contoh: peserta@email.com" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> Simpan Data
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>