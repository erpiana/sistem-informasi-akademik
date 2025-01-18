<?php
include 'database_pia.php'; 

if (isset($_GET['kodeSemester'])) {
    $kodeSemester = $_GET['kodeSemester'];
    $sql = "SELECT * FROM semester WHERE KodeSemester = '$kodeSemester'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data semester tidak ditemukan.";
        exit;
    }
} else {
    echo "KodeSemester tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $namaSemester = $_POST['namaSemester'];
    $statusSemester = $_POST['statusSemester'];

    $updateQuery = "UPDATE semester SET 
                    NamaSemester = '$namaSemester',
                    StatusSemester = '$statusSemester'
                    WHERE KodeSemester = '$kodeSemester'";

    if ($conn->query($updateQuery) === TRUE) {
        // Redirect ke halaman semester setelah data berhasil diupdate
        header("Location: index.php?page=semester");
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
    <title>Edit Semester</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Semester</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="semester.php">Semester</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_semester.php?kodeSemester=<?php echo $kodeSemester; ?>" method="POST">
        <label for="namaSemester">Nama Semester:</label>
        <input type="text" id="namaSemester" name="namaSemester" value="<?php echo $row['NamaSemester']; ?>" required>

        <label for="statusSemester">Status Semester:</label>
        <input type="text" id="statusSemester" name="statusSemester" value="<?php echo $row['StatusSemester']; ?>" required>

        <input type="submit" name="submit" value="Update Semester">
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
