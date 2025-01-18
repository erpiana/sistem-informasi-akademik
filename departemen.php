<?php
include 'database_pia.php'; 

// Ambil data dari tabel departemen
$sql = "SELECT * FROM departemen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Departemen</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Departemen</h3>
    <a href="insert_departemen.php" class="btn">Tambah Departemen</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Kode Departemen</th>
        <th>Nama Departemen</th>
        <th>Kode Fakultas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['KodeDepartemen']; ?></td>
            <td><?php echo $row['NamaDepartemen']; ?></td>
            <td><?php echo $row['KodeFakultas']; ?></td>
            <td>
              <a href="edit_departemen.php?KodeDepartemen=<?php echo $row['KodeDepartemen']; ?>">Edit</a> |
              <a href="delete_departemen.php?KodeDepartemen=<?php echo $row['KodeDepartemen']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="4">Tidak ada data departemen.</td>
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
