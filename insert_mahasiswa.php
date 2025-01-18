<?php
include 'database_pia.php';

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tmpLahir = $_POST['tmpLahir'];
    $tglLahir = $_POST['tglLahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $kodeProdi = $_POST['kodeProdi'];

    // Query SQL untuk menambahkan data mahasiswa
    $insertQuery = "INSERT INTO mahasiswa (NIM, Nama, TmpLahir, TglLahir, Gender, Alamat, NoHP, KodeProdi)
                    VALUES ('$nim', '$nama', '$tmpLahir', '$tglLahir', '$gender', '$alamat', '$noHp', '$kodeProdi')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=mahasiswa");
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
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Mahasiswa</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="mahasiswa.php">Mahasiswa</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_mahasiswa.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tmpLahir">Tempat Lahir:</label>
        <input type="text" id="tmpLahir" name="tmpLahir" required>

        <label for="tglLahir">Tanggal Lahir:</label>
        <input type="date" id="tglLahir" name="tglLahir" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="noHp">No HP:</label>
        <input type="text" id="noHp" name="noHp" required>

        <label for="kodeProdi">Kode Prodi:</label>
        <input type="text" id="kodeProdi" name="kodeProdi" required>

        <input type="submit" name="submit" value="Tambah Mahasiswa">
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
