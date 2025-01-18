<?php
include 'database_pia.php'; 

// Cek apakah KodeDepartemen ada di URL
if (isset($_GET['KodeDepartemen'])) {
    $kodeDepartemen = $_GET['KodeDepartemen'];
    
    // Ambil data departemen berdasarkan KodeDepartemen
    $sql = "SELECT * FROM departemen WHERE KodeDepartemen = '$kodeDepartemen'";
    $result = $conn->query($sql);
    
    // Jika data ditemukan, tampilkan dalam form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data departemen tidak ditemukan.";
        exit;
    }
} else {
    echo "KodeDepartemen tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaDepartemen = $_POST['namaDepartemen'];
    $kodeFakultas = $_POST['kodeFakultas'];

    // Query SQL untuk update data departemen
    $updateQuery = "UPDATE departemen SET 
                    NamaDepartemen = '$namaDepartemen',
                    KodeFakultas = '$kodeFakultas'
                    WHERE KodeDepartemen = '$kodeDepartemen'";

    // Eksekusi query
    if ($conn->query($updateQuery) === TRUE) {
        // Setelah berhasil, arahkan ke halaman departemen
        header("Location: index.php?page=departemen");
        exit(); // Hentikan eksekusi setelah pengalihan
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
    <title>Edit Departemen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Departemen</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="departemen.php">Departemen</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_departemen.php?KodeDepartemen=<?php echo $kodeDepartemen; ?>" method="POST">
        <label for="namaDepartemen">Nama Departemen:</label>
        <input type="text" id="namaDepartemen" name="namaDepartemen" value="<?php echo $row['NamaDepartemen']; ?>" required>

        <label for="kodeFakultas">Kode Fakultas:</label>
        <input type="text" id="kodeFakultas" name="kodeFakultas" value="<?php echo $row['KodeFakultas']; ?>" required>

        <input type="submit" name="submit" value="Update Departemen">
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
