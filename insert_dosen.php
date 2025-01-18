<?php
include 'database_pia.php'; 

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kodeDosen = $_POST['kodeDosen'];
    $namaDosen = $_POST['namaDosen'];
    $tmpLahir = $_POST['tmpLahir'];
    $tglLahir = $_POST['tglLahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $kepakaran = $_POST['kepakaran'];

    // Query SQL untuk menambahkan data dosen
    $insertQuery = "INSERT INTO dosen (KodeDosen, NamaDosen, TmpLahir, TglLahir, Gender, Alamat, Kepakaran)
                    VALUES ('$kodeDosen', '$namaDosen', '$tmpLahir', '$tglLahir', '$gender', '$alamat', '$kepakaran')";

    // Eksekusi query
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=dosen"); 
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
    <title>Tambah Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Dosen</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="dosen.php">Dosen</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_dosen.php" method="POST">
        <label for="kodeDosen">Kode Dosen:</label>
        <input type="text" id="kodeDosen" name="kodeDosen" required>

        <label for="namaDosen">Nama Dosen:</label>
        <input type="text" id="namaDosen" name="namaDosen" required>

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

        <label for="kepakaran">Kepakaran:</label>
        <input type="text" id="kepakaran" name="kepakaran" required>

        <input type="submit" name="submit" value="Tambah Dosen">
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
