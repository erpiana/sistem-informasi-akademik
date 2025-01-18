<?php
include 'database_pia.php'; 

if (isset($_GET['idPenelitian'])) {
    $idPenelitian = $_GET['idPenelitian'];
    $sql = "SELECT * FROM penelitian WHERE IdPenelitian = '$idPenelitian'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data penelitian tidak ditemukan.";
        exit;
    }
} else {
    echo "IdPenelitian tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $namaPenelitian = $_POST['namaPenelitian'];
    $areaPenelitian = $_POST['areaPenelitian'];
    $durasiPenelitian = $_POST['durasiPenelitian'];
    $sumberBiaya = $_POST['sumberBiaya'];
    $biayaPenelitian = $_POST['biayaPenelitian'];

    $updateQuery = "UPDATE penelitian SET 
                    NamaPenelitian = '$namaPenelitian',
                    AreaPenelitian = '$areaPenelitian',
                    DurasiPenelitian = '$durasiPenelitian',
                    SumberBiaya = '$sumberBiaya',
                    BiayaPenelitian = '$biayaPenelitian'
                    WHERE IdPenelitian = '$idPenelitian'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php?page=penelitian"); 
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
    <title>Edit Penelitian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h2>Edit Data Penelitian</h2>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="penelitian.php">Penelitian</a></li>
    </ul>
</nav>

<div class="container">
    <form action="edit_penelitian.php?idPenelitian=<?php echo $idPenelitian; ?>" method="POST">
        <label for="namaPenelitian">Nama Penelitian:</label>
        <input type="text" id="namaPenelitian" name="namaPenelitian" value="<?php echo $row['NamaPenelitian']; ?>" required>

        <label for="areaPenelitian">Area Penelitian:</label>
        <input type="text" id="areaPenelitian" name="areaPenelitian" value="<?php echo $row['AreaPenelitian']; ?>" required>

        <label for="durasiPenelitian">Durasi Penelitian:</label>
        <input type="text" id="durasiPenelitian" name="durasiPenelitian" value="<?php echo $row['DurasiPenelitian']; ?>" required>

        <label for="sumberBiaya">Sumber Biaya:</label>
        <input type="text" id="sumberBiaya" name="sumberBiaya" value="<?php echo $row['SumberBiaya']; ?>" required>

        <label for="biayaPenelitian">Biaya Penelitian:</label>
        <input type="text" id="biayaPenelitian" name="biayaPenelitian" value="<?php echo $row['BiayaPenelitian']; ?>" required>

        <input type="submit" name="submit" value="Update Penelitian">
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

