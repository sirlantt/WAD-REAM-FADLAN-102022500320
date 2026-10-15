<?php 
include 'koneksi.php';

// 1. LOGIC CREATE & UPDATE (Simpan / Perbarui Data)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $kontak   = $_POST['kontak'];
    $email    = $_POST['email'];

    if (!empty($nama)) {
        if (!empty($id)) {
            // LOGIC UPDATE: Jika ID ada, jalankan kueri UPDATE
            $query_update = "UPDATE peserta SET nama='$nama', instansi='$instansi', kontak='$kontak', email='$email' WHERE id='$id'";
            mysqli_query($koneksi, $query_update);
        } else {
            // LOGIC CREATE: Jika ID kosong, jalankan kueri INSERT
            $query_insert = "INSERT INTO peserta (nama, instansi, kontak, email) VALUES ('$nama', '$instansi', '$kontak', '$email')";
            mysqli_query($koneksi, $query_insert);
        }
        
        header("Location: daftar_peserta.php");
        exit();
    }
}

// 2. LOGIC DELETE (Hapus Data)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query_delete = "DELETE FROM peserta WHERE id = '$id'";
    mysqli_query($koneksi, $query_delete);

    header("Location: daftar_peserta.php");
    exit();
}

// 3. LOGIC READ ALL (Membaca Seluruh Data dari Database)
$query_select = "SELECT * FROM peserta ORDER BY id ASC";
$result = mysqli_query($koneksi, $query_select);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary m-0"><i class="bi bi-people-fill me-2"></i>Daftar Peserta</h3>
            <a href="profile_peserta.php" class="btn btn-primary fw-bold">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Peserta Baru
            </a>
        </div>

        <div class="card shadow-sm border-0 p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-primary mb-0">List Peserta Terdaftar</h5>
                <span class="badge bg-primary"><?php echo mysqli_num_rows($result); ?> Peserta</span>
            </div>

            <div class="table-responsive">
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
                        <?php 
                        $no = 1;
                        while ($p = mysqli_fetch_assoc($result)) { 
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td class="fw-semibold"><?php echo htmlspecialchars($p['nama']); ?></td>
                                <td><span class="badge bg-secondary"><?php echo htmlspecialchars($p['instansi']); ?></span></td>
                                <td><?php echo htmlspecialchars($p['kontak']); ?></td>
                                <td><?php echo htmlspecialchars($p['email']); ?></td>
                                <td class="text-center">
                                    <!-- Tombol EDIT (Read single record & Redirect ke Form) -->
                                    <a href="profile_peserta.php?edit=<?php echo $p['id']; ?>" 
                                       class="btn btn-sm btn-outline-warning me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- Tombol HAPUS -->
                                    <a href="daftar_peserta.php?hapus=<?php echo $p['id']; ?>" 
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('Hapus data ini?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>