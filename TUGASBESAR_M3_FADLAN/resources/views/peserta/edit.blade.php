<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <!-- Header di Luar Kotak / Card -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold text-primary m-0">Edit Data Peserta</h3>
                    <a href="{{ route('peserta.index') }}" class="btn btn-primary fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Tabel
                    </a>
                </div>

                <!-- Card Form -->
                <div class="card shadow-sm border-0 p-4">
                    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label small fw-bold">NAMA LENGKAP</label>
                            <input type="text" name="nama" class="form-control" value="{{ $peserta->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">INSTANSI / KAMPUS</label>
                            <input type="text" name="instansi" class="form-control" value="{{ $peserta->instansi }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">NO. WHATSAPP</label>
                            <input type="text" name="kontak" class="form-control" value="{{ $peserta->kontak }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">EMAIL</label>
                            <input type="email" name="email" class="form-control" value="{{ $peserta->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Update Data</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>