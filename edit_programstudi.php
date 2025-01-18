<?php
include 'database_pia.php'; 

// Cek apakah KodeProdi ada di URL
if (isset($_GET['kodeProdi'])) {
    $kodeProdi = $_GET['kodeProdi'];
    
    // Ambil data program studi berdasarkan KodeProdi
    $sql = "SELECT * FROM programstudi WHERE KodeProdi = '$kodeProdi'";
    $result = $conn->query($sql);
    
    // Jika data ditemukan, tampilkan dalam form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data program studi tidak ditemukan.";
        exit;
    }
} else {
    echo "KodeProdi tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaProdi = $_POST['namaProdi'];
    $kodeDepartemen = $_POST['kodeDepartemen'];

    $updateQuery = "UPDATE programstudi SET 
                    NamaProdi = '$namaProdi',
                    KodeDepartemen = '$kodeDepartemen'
                    WHERE KodeProdi = '$kodeProdi'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Data program studi berhasil diupdate'); window.location='programstudi.php';</script>";
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
    <title>Edit Program Studi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Program Studi</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="programstudi.php">Program Studi</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_programstudi.php?kodeProdi=<?php echo $kodeProdi; ?>" method="POST">
        <label for="namaProdi">Nama Prodi:</label>
        <input type="text" id="namaProdi" name="namaProdi" value="<?php echo $row['NamaProdi']; ?>" required>

        <label for="kodeDepartemen">Kode Departemen:</label>
        <input type="text" id="kodeDepartemen" name="kodeDepartemen" value="<?php echo $row['KodeDepartemen']; ?>" required>

        <input type="submit" name="submit" value="Update Program Studi">
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
