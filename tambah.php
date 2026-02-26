<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES ('$npm', '$nama', '$jurusan')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card-title {
            text-align: center;
            color: #0d6efd;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="card-title mb-4">Tambah Mahasiswa</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">NPM</label>
                <input type="text" name="npm" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <button type="submit" name="submit" class="btn btn-success">
                    <i class="bi bi-save-fill"></i> Simpan
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle-fill"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>