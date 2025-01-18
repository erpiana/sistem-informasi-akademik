<?php
include 'database_pia.php';

// Ambil data dari tabel penelitian
$sql = "SELECT * FROM penelitian";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Penelitian</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Penelitian</h3>
    <a href="insert_penelitian.php" class="btn">Tambah Penelitian</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>ID Penelitian</th>
        <th>Nama Penelitian</th>
        <th>Area Penelitian</th>
        <th>Durasi Penelitian</th>
        <th>Sumber Biaya</th>
        <th>Biaya Penelitian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['IdPenelitian']; ?></td>
            <td><?php echo $row['NamaPenelitian']; ?></td>
            <td><?php echo $row['AreaPenelitian']; ?></td>
            <td><?php echo $row['DurasiPenelitian']; ?></td>
            <td><?php echo $row['SumberBiaya']; ?></td>
            <td><?php echo $row['BiayaPenelitian']; ?></td>
            <td>
              <a href="edit_penelitian.php?idPenelitian=<?php echo $row['IdPenelitian']; ?>">Edit</a> |
              <a href="delete_penelitian.php?idPenelitian=<?php echo $row['IdPenelitian']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="7">Tidak ada data penelitian.</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<footer>
  <p>&copy; 2024 Sistem Akademik</p>
</footer>

</body>
</html>

<?php
$conn->close(); 
?>
