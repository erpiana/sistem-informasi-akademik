<?php
include 'database_pia.php'; 

// Cek apakah NIM ada di URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    // Query SQL untuk menghapus data mahasiswa berdasarkan NIM
    $deleteQuery = "DELETE FROM mahasiswa WHERE NIM = '$nim'";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=mahasiswa");
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
} else {
    echo "NIM tidak ditemukan.";
}

$conn->close(); 
?>
