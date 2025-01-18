<?php
include 'database_pia.php'; 

// Ambil data dari tabel fakultas
$sql = "SELECT * FROM fakultas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Fakultas</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Fakultas</h3>
    <a href="insert_fakultas.php" class="btn">Tambah Fakultas</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Kode Fakultas</th>
        <th>Nama Fakultas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['KodeFakultas']; ?></td>
            <td><?php echo $row['NamaFakultas']; ?></td>
            <td>
              <a href="edit_fakultas.php?kodeFakultas=<?php echo $row['KodeFakultas']; ?>">Edit</a> |
              <a href="delete_fakultas.php?kodeFakultas=<?php echo $row['KodeFakultas']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="3">Tidak ada data fakultas.</td>
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
