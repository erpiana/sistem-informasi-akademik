<?php
include 'database_pia.php'; // Koneksi ke database

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kodeProdi = $_POST['kodeProdi'];
    $namaProdi = $_POST['namaProdi'];
    $kodeDepartemen = $_POST['kodeDepartemen'];

    // Query SQL untuk menambahkan data program studi
    $insertQuery = "INSERT INTO programstudi (KodeProdi, NamaProdi, KodeDepartemen)
                    VALUES ('$kodeProdi', '$namaProdi', '$kodeDepartemen')";

    // Eksekusi query
    if ($conn->query($insertQuery) === TRUE) {
        // Jika berhasil, arahkan ke halaman program studi
        header("Location: index.php?page=programstudi"); // Arahkan ke halaman programstudi
        exit(); // Pastikan script berhenti setelah pengalihan
    } else {
        echo "<script>alert('Gagal menambahkan data program studi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Studi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Program Studi</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="programstudi.php">Program Studi</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_programstudi.php" method="POST">
        <label for="kodeProdi">Kode Prodi:</label>
        <input type="text" id="kodeProdi" name="kodeProdi" required>

        <label for="namaProdi">Nama Prodi:</label>
        <input type="text" id="namaProdi" name="namaProdi" required>

        <label for="kodeDepartemen">Kode Departemen:</label>
        <input type="text" id="kodeDepartemen" name="kodeDepartemen" required>

        <input type="submit" name="submit" value="Tambah Program Studi">
    </form>
</div>

<footer>
    <p>&copy; 2024 Sistem Akademik</p>
</footer>

</body>
</html>

<?php
$conn->close(); // Tutup koneksi
?>
