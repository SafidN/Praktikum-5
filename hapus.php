<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    $conn->query($sql);
}

header("Location: index.php");
?>