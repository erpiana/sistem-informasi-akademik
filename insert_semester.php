<?php
include 'database_pia.php'; 

if (isset($_POST['submit'])) {
    $kodeSemester = $_POST['kodeSemester'];
    $namaSemester = $_POST['namaSemester'];
    $statusSemester = $_POST['statusSemester'];

    $insertQuery = "INSERT INTO semester (KodeSemester, NamaSemester, StatusSemester)
                    VALUES ('$kodeSemester', '$namaSemester', '$statusSemester')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php?page=semester");
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
    <title>Tambah Semester</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Tambah Data Semester</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="semester.php">Semester</a></li>
    </ul>
</nav>

<div class="container">
    <form action="insert_semester.php" method="POST">
        <label for="kodeSemester">Kode Semester:</label>
        <input type="text" id="kodeSemester" name="kodeSemester" required>

        <label for="namaSemester">Nama Semester:</label>
        <input type="text" id="namaSemester" name="namaSemester" required>

        <label for="statusSemester">Status Semester:</label>
        <input type="text" id="statusSemester" name="statusSemester" required>

        <input type="submit" name="submit" value="Tambah Semester">
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
