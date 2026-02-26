<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    if ($id == '') {
        $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES ('$npm', '$nama', '$jurusan')";
    } else {

        $sql = "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$id = '';
$npm = '';
$nama = '';
$jurusan = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $npm = $row['npm'];
        $nama = $row['nama'];
        $jurusan = $row['jurusan'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $id ? "Edit" : "Tambah"; ?> Mahasiswa</title>

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
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h2 class="card-title mb-4"><?php echo $id ? "Edit" : "Tambah"; ?> Data Mahasiswa</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">NPM</label>
                <input type="text" name="npm" value="<?php echo $npm; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" value="<?php echo $jurusan; ?>" class="form-control" required>
            </div>
            <div class="btn-group">
                <button type="submit" name="submit" class="btn btn-success">
                    <i class="bi bi-save-fill"></i> <?php echo $id ? "Update" : "Simpan"; ?>
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