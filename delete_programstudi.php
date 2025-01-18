<?php
include 'database_pia.php'; 

// Cek apakah KodeProdi ada di URL
if (isset($_GET['kodeProdi'])) {
    $kodeProdi = $_GET['kodeProdi'];

    $deleteQuery = "DELETE FROM programstudi WHERE KodeProdi = '$kodeProdi'";

    if ($conn->query($deleteQuery) === TRUE) {
        // Jika berhasil, arahkan ke halaman program studi
        header("Location: index.php?page=programstudi"); 
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data program studi!'); window.location='programstudi.php';</script>";
    }
} else {
    echo "<script>alert('Kode Prodi tidak ditemukan!'); window.location='programstudi.php';</script>";
}

$conn->close(); 
?>
