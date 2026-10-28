<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary m-0"><i class="bi bi-people-fill me-2"></i>Daftar Peserta</h3>
            <a href="{{ route('peserta.create') }}" class="btn btn-primary fw-bold">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Peserta Baru
            </a>
        </div>
        <div class="card shadow-sm border-0 p-3">
            <div class="table-responsive">
                <table class="table table-white align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA PESERTA</th>
                            <th>INSTANSI</th>
                            <th>KONTAK</th>
                            <th>EMAIL</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td><span class="badge bg-secondary">{{ $p->instansi }}</span></td>
                            <td>{{ $p->kontak }}</td>
                            <td>{{ $p->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('peserta.edit', $p->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>