<?php
include 'database_pia.php'; 

if (isset($_GET['idPenelitian'])) {
    $idPenelitian = $_GET['idPenelitian'];

    $deleteQuery = "DELETE FROM penelitian WHERE IdPenelitian = '$idPenelitian'";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: index.php?page=penelitian"); 
        exit(); 
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='penelitian.php';</script>";
    }
} else {
    echo "<script>alert('IdPenelitian tidak ditemukan!'); window.location='penelitian.php';</script>";
}

$conn->close(); 
?>
