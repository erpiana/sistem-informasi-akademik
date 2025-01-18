<?php
include 'database_pia.php';

if (isset($_GET['kodeSemester'])) {
    $kodeSemester = $_GET['kodeSemester'];

    $deleteQuery = "DELETE FROM semester WHERE KodeSemester = '$kodeSemester'";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=semester");
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php?page=semester';</script>";
    }
} else {
    echo "<script>alert('KodeSemester tidak ditemukan!'); window.location='index.php?page=semester';</script>";
}

$conn->close(); 
?>
