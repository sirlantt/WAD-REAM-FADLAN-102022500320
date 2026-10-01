<?php
$daftar_peserta = [
    ['no' => 1, 'nama' => 'Muhammad Fadlan Fatahillah', 'instansi' => 'Telkom University', 'kontak' => '081234567890', 'email' => 'fadlan@telkom.com'],
    ['no' => 2, 'nama' => 'Siti Rahma', 'instansi' => 'Universitas Diponegoro', 'kontak' => '089876543210', 'email' => 'siti@example.com']
];

$notif = "";
$tipe_notif = "";

// 1. Logika Tambah Data (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $daftar_peserta[] = [
        'no'       => count($daftar_peserta) + 1,
        'nama'     => htmlspecialchars($_POST['nama']),
        'instansi' => htmlspecialchars($_POST['instansi']),
        'kontak'   => htmlspecialchars($_POST['kontak']),
        'email'    => htmlspecialchars($_POST['email'])
    ];
    $notif = "Data berhasil disimpan!";
    $tipe_notif = "success";
}

// 2. Logika Hapus Data (GET)
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    foreach ($daftar_peserta as $index => $peserta) {
        if ($peserta['no'] == $_GET['no']) {
            unset($daftar_peserta[$index]);
            $notif = "Data No. " . $_GET['no'] . " berhasil dihapus!";
            $tipe_notif = "danger";
            break;
        }
    }
    $daftar_peserta = array_values($daftar_peserta);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Peserta Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h3 class="fw-bold text-primary mb-4"><i class="bi bi-person-badge-fill me-2"></i>Pengelolaan Profile Peserta</h3>

        <!-- ALERT NOTIFIKASI -->
        <?php if ($notif): ?>
            <div class="alert alert-<?= $tipe_notif ?> alert-dismissible fade show" role="alert">
                <?= $notif ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <!-- FORM INPUT -->
            <div class="col-md-5">
                <div class="card shadow-sm border-0 p-3">
                    <h5 class="fw-bold text-primary mb-3"><i class="bi bi-person-plus-fill me-2"></i>Tambah Peserta</h5>
                    <form action="profile_peserta.php" method="POST">
                        <div class="mb-2">
                            <label class="form-label small fw-bold">NAMA LENGKAP</label>
                            <input type="text" class="form-control" name="nama" placeholder="Contoh: Ahmad Fauzi" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-bold">INSTANSI / KAMPUS</label>
                            <input type="text" class="form-control" name="instansi" placeholder="Contoh: Telkom University" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-bold">NO. WHATSAPP</label>
                            <input type="tel" class="form-control" name="kontak" placeholder="Contoh: 081234567890" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="Contoh: ahmad@example.com" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </form>
                </div>
            </div>

            <!-- TABEL DATA (MENGGUNAKAN TABLE-DARK) -->
            <div class="col-md-7">
                <div class="card shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary mb-0"><i class="bi bi-people-fill me-2"></i>Daftar Peserta</h5>
                        <span class="badge bg-primary"><?= count($daftar_peserta) ?> Peserta</span>
                    </div>

                    <div class="table-responsive">
                        <!-- Class 'table table-dark' diterapkan di sini -->
                        <table class="table table-dark align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NAMA PESERTA</th>
                                    <th scope="col">INSTANSI</th>
                                    <th scope="col">KONTAK</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col" class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($daftar_peserta)): ?>
                                    <tr><td colspan="6" class="text-center text-secondary py-3">Belum ada data peserta.</td></tr>
                                <?php else: ?>
                                    <?php foreach ($daftar_peserta as $p): ?>
                                        <tr>
                                            <th scope="row"><?= $p['no'] ?></th>
                                            <td class="fw-semibold"><?= $p['nama'] ?></td>
                                            <td><span class="badge bg-secondary"><?= $p['instansi'] ?></span></td>
                                            <td><?= $p['kontak'] ?></td>
                                            <td><?= $p['email'] ?></td>
                                            <td class="text-center">
                                                <a href="profile_peserta.php?aksi=hapus&no=<?= $p['no'] ?>" 
                                                   class="btn btn-sm btn-outline-danger"
                                                   onclick="return confirm('Hapus data ini?');">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>