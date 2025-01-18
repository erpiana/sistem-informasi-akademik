<?php
include 'database_pia.php'; 

// Ambil data dari tabel program_studi
$sql = "SELECT * FROM programstudi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Program Studi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Program Studi</h3>
    <a href="insert_programstudi.php" class="btn">Tambah Program Studi</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Kode Prodi</th>
        <th>Nama Prodi</th>
        <th>Kode Departemen</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['KodeProdi']; ?></td>
            <td><?php echo $row['NamaProdi']; ?></td>
            <td><?php echo $row['KodeDepartemen']; ?></td>
            <td>
              <a href="edit_programstudi.php?kodeProdi=<?php echo $row['KodeProdi']; ?>">Edit</a> |
              <a href="delete_programstudi.php?kodeProdi=<?php echo $row['KodeProdi']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="4">Tidak ada data program studi.</td>
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
