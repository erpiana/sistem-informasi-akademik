<?php
include 'database_pia.php';

// Cek apakah NIM ada di URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    // Ambil data mahasiswa berdasarkan NIM
    $sql = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
    $result = $conn->query($sql);
    
    // Jika data ditemukan, tampilkan dalam form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data mahasiswa tidak ditemukan.";
        exit;
    }
} else {
    echo "NIM tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $tmpLahir = $_POST['tmpLahir'];
    $tglLahir = $_POST['tglLahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $kodeProdi = $_POST['kodeProdi'];

    // Query SQL untuk update data mahasiswa
    $updateQuery = "UPDATE mahasiswa SET 
                    Nama = '$nama',
                    TmpLahir = '$tmpLahir',
                    TglLahir = '$tglLahir',
                    Gender = '$gender',
                    Alamat = '$alamat',
                    NoHP = '$noHp',
                    KodeProdi = '$kodeProdi'
                    WHERE NIM = '$nim'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php?page=mahasiswa");  // Mengarahkan ke halaman mahasiswa
        exit(); // Jangan lupa exit setelah header
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Mahasiswa</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="mahasiswa.php">Mahasiswa</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_mahasiswa.php?nim=<?php echo $nim; ?>" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['Nama']; ?>" required>

        <label for="tmpLahir">Tempat Lahir:</label>
        <input type="text" id="tmpLahir" name="tmpLahir" value="<?php echo $row['TmpLahir']; ?>" required>

        <label for="tglLahir">Tanggal Lahir:</label>
        <input type="date" id="tglLahir" name="tglLahir" value="<?php echo $row['TglLahir']; ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="L" <?php echo ($row['Gender'] == 'L') ? 'selected' : ''; ?>>Laki-Laki</option>
            <option value="P" <?php echo ($row['Gender'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required><?php echo $row['Alamat']; ?></textarea>

        <label for="noHp">No HP:</label>
        <input type="text" id="noHp" name="noHp" value="<?php echo $row['NoHP']; ?>" required>

        <label for="kodeProdi">Kode Prodi:</label>
        <input type="text" id="kodeProdi" name="kodeProdi" value="<?php echo $row['KodeProdi']; ?>" required>

        <input type="submit" name="submit" value="Update Mahasiswa">
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
