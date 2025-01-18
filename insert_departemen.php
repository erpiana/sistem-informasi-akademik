<?php
include 'database_pia.php'; 

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kodeDepartemen = $_POST['kodeDepartemen'];
    $namaDepartemen = $_POST['namaDepartemen'];
    $kodeFakultas = $_POST['kodeFakultas'];

    // Query SQL untuk menambahkan data departemen
    $insertQuery = "INSERT INTO departemen (KodeDepartemen, NamaDepartemen, KodeFakultas)
                    VALUES ('$kodeDepartemen', '$namaDepartemen', '$kodeFakultas')";

    // Eksekusi query
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=departemen");
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
    <title>Tambah Departemen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Departemen</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="departemen.php">Departemen</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_departemen.php" method="POST">
        <label for="kodeDepartemen">Kode Departemen:</label>
        <input type="text" id="kodeDepartemen" name="kodeDepartemen" required>

        <label for="namaDepartemen">Nama Departemen:</label>
        <input type="text" id="namaDepartemen" name="namaDepartemen" required>

        <label for="kodeFakultas">Kode Fakultas:</label>
        <input type="text" id="kodeFakultas" name="kodeFakultas" required>

        <input type="submit" name="submit" value="Tambah Departemen">
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
