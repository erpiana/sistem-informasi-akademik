<?php
include 'database_pia.php'; 

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kodeFakultas = $_POST['kodeFakultas'];
    $namaFakultas = $_POST['namaFakultas'];

    // Query SQL untuk menambahkan data fakultas
    $insertQuery = "INSERT INTO fakultas (KodeFakultas, NamaFakultas)
                    VALUES ('$kodeFakultas', '$namaFakultas')";

    // Eksekusi query
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=fakultas");
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
    <title>Tambah Fakultas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Fakultas</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="fakultas.php">Fakultas</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_fakultas.php" method="POST">
        <label for="kodeFakultas">Kode Fakultas:</label>
        <input type="text" id="kodeFakultas" name="kodeFakultas" required>

        <label for="namaFakultas">Nama Fakultas:</label>
        <input type="text" id="namaFakultas" name="namaFakultas" required>

        <input type="submit" name="submit" value="Tambah Fakultas">
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
