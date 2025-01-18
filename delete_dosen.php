<?php
include 'database_pia.php'; 

// Cek apakah KodeDosen ada di URL
if (isset($_GET['kodeDosen'])) {
    $kodeDosen = $_GET['kodeDosen'];
    
    // Query SQL untuk menghapus data dosen berdasarkan KodeDosen
    $deleteQuery = "DELETE FROM dosen WHERE KodeDosen = '$kodeDosen'";

    // Eksekusi query
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=dosen");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
} else {
    echo "KodeDosen tidak ditemukan.";
}

$conn->close(); 
?>
