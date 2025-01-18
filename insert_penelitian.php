<?php
include 'database_pia.php'; 

if (isset($_POST['submit'])) {
    $idPenelitian = $_POST['idPenelitian'];
    $namaPenelitian = $_POST['namaPenelitian'];
    $areaPenelitian = $_POST['areaPenelitian'];
    $durasiPenelitian = $_POST['durasiPenelitian'];
    $sumberBiaya = $_POST['sumberBiaya'];
    $biayaPenelitian = $_POST['biayaPenelitian'];

    $insertQuery = "INSERT INTO penelitian (IdPenelitian, NamaPenelitian, AreaPenelitian, DurasiPenelitian, SumberBiaya, BiayaPenelitian)
                    VALUES ('$idPenelitian', '$namaPenelitian', '$areaPenelitian', '$durasiPenelitian', '$sumberBiaya', '$biayaPenelitian')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=penelitian");
        exit(); 
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penelitian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Penelitian</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="penelitian.php">Penelitian</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_penelitian.php" method="POST">
        <label for="idPenelitian">ID Penelitian:</label>
        <input type="text" id="idPenelitian" name="idPenelitian" required>

        <label for="namaPenelitian">Nama Penelitian:</label>
        <input type="text" id="namaPenelitian" name="namaPenelitian" required>

        <label for="areaPenelitian">Area Penelitian:</label>
        <input type="text" id="areaPenelitian" name="areaPenelitian" required>

        <label for="durasiPenelitian">Durasi Penelitian:</label>
        <input type="text" id="durasiPenelitian" name="durasiPenelitian" required>

        <label for="sumberBiaya">Sumber Biaya:</label>
        <input type="text" id="sumberBiaya" name="sumberBiaya" required>

        <label for="biayaPenelitian">Biaya Penelitian:</label>
        <input type="text" id="biayaPenelitian" name="biayaPenelitian" required>

        <input type="submit" name="submit" value="Tambah Penelitian">
    </form>
</div>

<footer>
    <p>&copy; 2024 Sistem Akademik</p>
</footer>

</body>
</html>

<?php
$conn->close(); 
?>
