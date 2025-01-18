<?php
include 'database_pia.php';

// Ambil data dari tabel matakuliah
$sql = "SELECT * FROM matakuliah";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mata Kuliah</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Mata Kuliah</h3>
    <a href="insert_matakuliah.php" class="btn">Tambah Mata Kuliah</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Id Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Kode Mata Kuliah</th>
        <th>Kode Semester</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['IdMK']; ?></td>
            <td><?php echo $row['NamaMK']; ?></td>
            <td><?php echo $row['KodeMK']; ?></td>
            <td><?php echo $row['KodeSemester']; ?></td>
            <td>
              <a href="edit_matakuliah.php?IdMK=<?php echo $row['IdMK']; ?>">Edit</a> |
              <a href="delete_matakuliah.php?IdMK=<?php echo $row['IdMK']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="6">Tidak ada data mata kuliah.</td>
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
