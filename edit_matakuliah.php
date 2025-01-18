<?php
include 'database_pia.php';

// Cek apakah IdMK ada di URL
if (isset($_GET['IdMK'])) {
    $idMK = $_GET['IdMK'];
    
    // Ambil data mata kuliah berdasarkan IdMK
    $sql = "SELECT * FROM matakuliah WHERE IdMK = '$idMK'";
    $result = $conn->query($sql);
    
    // Jika data ditemukan, tampilkan dalam form
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data mata kuliah tidak ditemukan.";
        exit;
    }
} else {
    echo "IdMK tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaMK = $_POST['namaMK'];
    $kodeMK = $_POST['kodeMK'];
    $kodeSemester = $_POST['kodeSemester'];

    $updateQuery = "UPDATE matakuliah SET 
                    NamaMK = '$namaMK',
                    KodeMK = '$kodeMK',
                    KodeSemester = '$kodeSemester'
                    WHERE IdMK = '$idMK'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php?page=matakuliah"); 
        exit(); 
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
        echo "<script>window.location='index.php?page=matakuliah';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Mata Kuliah</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="matakuliah.php">Mata Kuliah</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_matakuliah.php?IdMK=<?php echo $idMK; ?>" method="POST">
        <label for="namaMK">Nama Mata Kuliah:</label>
        <input type="text" id="namaMK" name="namaMK" value="<?php echo $row['NamaMK']; ?>" required>

        <label for="kodeMK">Kode Mata Kuliah:</label>
        <input type="text" id="kodeMK" name="kodeMK" value="<?php echo $row['KodeMK']; ?>" required>

        <label for="kodeSemester">Kode Semester:</label>
        <input type="text" id="kodeSemester" name="kodeSemester" value="<?php echo $row['KodeSemester']; ?>" required>

        <input type="submit" name="submit" value="Update Mata Kuliah">
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
