<?php
include 'database_pia.php'; 

// Cek apakah KodeFakultas ada di URL
if (isset($_GET['kodeFakultas'])) {
    $kodeFakultas = $_GET['kodeFakultas'];
    
    // Ambil data fakultas berdasarkan KodeFakultas
    $sql = "SELECT * FROM fakultas WHERE KodeFakultas = '$kodeFakultas'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data fakultas tidak ditemukan.";
        exit;
    }
} else {
    echo "KodeFakultas tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaFakultas = $_POST['namaFakultas'];

    // Query SQL untuk update data fakultas
    $updateQuery = "UPDATE fakultas SET 
                    NamaFakultas = '$namaFakultas'
                    WHERE KodeFakultas = '$kodeFakultas'";

    // Eksekusi query
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php?page=fakultas");
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
    <title>Edit Fakultas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Fakultas</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="fakultas.php">Fakultas</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_fakultas.php?kodeFakultas=<?php echo $kodeFakultas; ?>" method="POST">
        <label for="namaFakultas">Nama Fakultas:</label>
        <input type="text" id="namaFakultas" name="namaFakultas" value="<?php echo $row['NamaFakultas']; ?>" required>

        <input type="submit" name="submit" value="Update Fakultas">
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
