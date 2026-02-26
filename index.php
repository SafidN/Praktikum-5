<?php
include 'connection.php';

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa Universitas Siliwangi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .table-custom th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
        }
        .table-custom td {
            text-align: center;
        }
        .table-custom tr:hover {
            background-color: #d6e4ff; 
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h1 class="text-center mb-4">Daftar Mahasiswa Universitas Siliwangi</h1>

        <div class="text-center mb-3">
            <a href="update.php" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Tambah Data Baru
            </a>
        </div>

        <div class="d-flex justify-content-center">
            <table class="table table-striped table-bordered table-custom ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['npm']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['jurusan']."</td>
                                <td>
                                    <a href='update.php?id=".$row['id']."' class='btn btn-warning btn-sm me-1'>
                                        <i class='bi bi-pencil-fill'></i> Edit
                                    </a>
                                    <a href='hapus.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin hapus?\");'>
                                        <i class='bi bi-trash-fill'></i> Hapus
                                    </a>
                                </td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>