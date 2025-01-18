<?php
include 'database_pia.php'; 

if (isset($_GET['kodeFakultas'])) {
    $kodeFakultas = $_GET['kodeFakultas'];

    $deleteQuery = "DELETE FROM fakultas WHERE KodeFakultas = '$kodeFakultas'";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=fakultas");
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php?page=fakultas';</script>";
    }
} else {
    echo "<script>alert('KodeFakultas tidak ditemukan!'); window.location='fakultas.php';</script>";
}

$conn->close(); 
?>
