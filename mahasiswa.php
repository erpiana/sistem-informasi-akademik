<?php
include 'database_pia.php'; // Koneksi ke database

// Ambil data dari tabel mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>

<div class="content">
  <div class="table-header">
    <h3>Daftar Mahasiswa</h3>
    <a href="insert_mahasiswa.php" class="btn">Tambah Mahasiswa</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Kode Prodi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['NIM']; ?></td>
            <td><?php echo $row['Nama']; ?></td>
            <td><?php echo $row['TmpLahir']; ?></td>
            <td><?php echo $row['TglLahir']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['Alamat']; ?></td>
            <td><?php echo $row['NoHP']; ?></td>
            <td><?php echo $row['KodeProdi']; ?></td>
            <td>
              <a href="edit_mahasiswa.php?nim=<?php echo $row['NIM']; ?>">Edit</a> |
              <a href="delete_mahasiswa.php?nim=<?php echo $row['NIM']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="9">Tidak ada data mahasiswa.</td>
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
