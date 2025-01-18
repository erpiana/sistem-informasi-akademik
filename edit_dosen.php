<?php
include 'database_pia.php'; 

// Cek apakah KodeDosen ada di URL
if (isset($_GET['kodeDosen'])) {
    $kodeDosen = $_GET['kodeDosen'];
    
    // Ambil data dosen berdasarkan KodeDosen
    $sql = "SELECT * FROM dosen WHERE KodeDosen = '$kodeDosen'";
    $result = $conn->query($sql);
    
    // Jika data ditemukan, tampilkan dalam form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data dosen tidak ditemukan.";
        exit;
    }
} else {
    echo "KodeDosen tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaDosen = $_POST['namaDosen'];
    $tmpLahir = $_POST['tmpLahir'];
    $tglLahir = $_POST['tglLahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $kepakaran = $_POST['kepakaran'];

    // Query SQL untuk update data dosen
    $updateQuery = "UPDATE dosen SET 
                    NamaDosen = '$namaDosen',
                    TmpLahir = '$tmpLahir',
                    TglLahir = '$tglLahir',
                    Gender = '$gender',
                    Alamat = '$alamat',
                    Kepakaran = '$kepakaran'
                    WHERE KodeDosen = '$kodeDosen'";

    /// Eksekusi query
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php?page=dosen"); 
        exit();
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
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Dosen</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="dosen.php">Dosen</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_dosen.php?kodeDosen=<?php echo $kodeDosen; ?>" method="POST">
        <label for="namaDosen">Nama Dosen:</label>
        <input type="text" id="namaDosen" name="namaDosen" value="<?php echo $row['NamaDosen']; ?>" required>

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

        <label for="kepakaran">Kepakaran:</label>
        <input type="text" id="kepakaran" name="kepakaran" value="<?php echo $row['Kepakaran']; ?>" required>

        <input type="submit" name="submit" value="Update Dosen">
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
