<?php
include 'database_pia.php';

// Cek apakah IdMK ada di URL
if (isset($_GET['IdMK'])) {
    $idMK = $_GET['IdMK'];
    
    // Query untuk menghapus data mata kuliah berdasarkan IdMK
    $deleteQuery = "DELETE FROM matakuliah WHERE IdMK = '$idMK'";

    // Eksekusi query
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=matakuliah"); 
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
        echo "<script>window.location='index.php?page=matakuliah';</script>";
    }
} else {
    echo "IdMK tidak ditemukan.";
}

$conn->close(); 
?>
