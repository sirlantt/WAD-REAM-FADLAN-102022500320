<?php
include 'koneksi.php';

// Menyiapkan variabel awal (kosong jika tambah data baru)
$id       = '';
$nama     = '';
$instansi = '';
$kontak   = '';
$email    = '';

// LOGIC READ FOR EDIT: Jika tombol Edit diklik dari daftar_peserta.php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM peserta WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    
    if ($data = mysqli_fetch_assoc($result)) {
        $nama     = $data['nama'];
        $instansi = $data['instansi'];
        $kontak   = $data['kontak'];
        $email    = $data['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ? 'Edit Peserta' : 'Tambah Peserta'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary m-0">
                <i class="bi bi-person-badge-fill me-2"></i>Pengelolaan Profile Peserta
            </h3>
            <a href="daftar_peserta.php" class="btn btn-outline-primary fw-bold">
                <i class="bi bi-people-fill me-1"></i> Lihat Daftar Peserta
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi <?php echo $id ? 'bi-pencil-square' : 'bi-person-plus-fill'; ?> me-2"></i>
                        <?php echo $id ? 'Edit Data Peserta' : 'Tambah Peserta Baru'; ?>
                    </h5>
                    
                    <form action="daftar_peserta.php" method="POST">
                        <!-- ID tersembunyi untuk penanda mode update -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label class="form-label small fw-bold">NAMA LENGKAP</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Contoh: Ahmad Fauzi" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">INSTANSI / KAMPUS</label>
                            <input type="text" class="form-control" name="instansi" value="<?php echo htmlspecialchars($instansi); ?>" placeholder="Contoh: Telkom University" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">NO. WHATSAPP</label>
                            <input type="tel" class="form-control" name="kontak" value="<?php echo htmlspecialchars($kontak); ?>" placeholder="Contoh: 081234567890" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">EMAIL</label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Contoh: ahmad@example.com" required>
                        </div>
                        
                        <button type="submit" name="simpan" class="btn btn-primary w-100 fw-bold">
                            <i class="bi bi-save me-1"></i> <?php echo $id ? 'Update Data' : 'Simpan Data'; ?>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>