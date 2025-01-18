<?php
include 'database_pia.php';

// Ambil data dari tabel semester
$sql = "SELECT * FROM semester";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Semester</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Semester</h3>
    <a href="insert_semester.php" class="btn">Tambah Semester</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Kode Semester</th>
        <th>Nama Semester</th>
        <th>Status Semester</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['KodeSemester']; ?></td>
            <td><?php echo $row['NamaSemester']; ?></td>
            <td><?php echo $row['StatusSemester']; ?></td>
            <td>
              <a href="edit_semester.php?kodeSemester=<?php echo $row['KodeSemester']; ?>">Edit</a> |
              <a href="delete_semester.php?kodeSemester=<?php echo $row['KodeSemester']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="4">Tidak ada data semester.</td>
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
