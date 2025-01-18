<?php
include 'database_pia.php'; 

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $idMK = $_POST['idMK'];
    $namaMK = $_POST['namaMK'];
    $kodeMK = $_POST['kodeMK'];
    $kodeSemester = $_POST['kodeSemester'];

    // Query SQL untuk menambahkan data mata kuliah
    $insertQuery = "INSERT INTO matakuliah (IdMK, NamaMK, KodeMK, KodeSemester)
                    VALUES ('$idMK', '$namaMK', '$kodeMK', '$kodeSemester')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=matakuliah"); 
        exit();
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
        echo "<script>window.location='index.php?page=matakuliah';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Mata Kuliah</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="matakuliah.php">Mata Kuliah</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_matakuliah.php" method="POST">
        <label for="idMK">Id Mata Kuliah:</label>
        <input type="text" id="idMK" name="idMK" required>

        <label for="namaMK">Nama Mata Kuliah:</label>
        <input type="text" id="namaMK" name="namaMK" required>

        <label for="kodeMK">Kode Mata Kuliah:</label>
        <input type="text" id="kodeMK" name="kodeMK" required>

        <label for="kodeSemester">Kode Semester:</label>
        <input type="text" id="kodeSemester" name="kodeSemester" required>

        <input type="submit" name="submit" value="Tambah Mata Kuliah">
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
