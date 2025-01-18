<?php
include 'database_pia.php'; 

// Cek apakah KodeDepartemen ada di URL
if (isset($_GET['KodeDepartemen'])) {
    $kodeDepartemen = $_GET['KodeDepartemen'];
    
    // Query untuk menghapus data departemen berdasarkan KodeDepartemen
    $deleteQuery = "DELETE FROM departemen WHERE KodeDepartemen = '$kodeDepartemen'";

    // Eksekusi query
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=departemen");
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
} else {
    echo "<script>alert('KodeDepartemen tidak ditemukan!'); window.location='departemen.php';</script>";
}

$conn->close(); 
?>
