<?php
include 'database_pia.php'; 

// Ambil data dari tabel dosen
$sql = "SELECT * FROM dosen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Dosen</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
  <!-- Bagian judul dan tombol tambah dosen -->
  <div class="table-header">
    <h3>Daftar Dosen</h3>
    <a href="insert_dosen.php" class="btn">Tambah Dosen</a>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Kode Dosen</th>
        <th>Nama Dosen</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>Kepakaran</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['KodeDosen']; ?></td>
            <td><?php echo $row['NamaDosen']; ?></td>
            <td><?php echo $row['TmpLahir']; ?></td>
            <td><?php echo $row['TglLahir']; ?></td>
            <td><?php echo ($row['Gender'] == 'L' ? 'Laki-Laki' : 'Perempuan'); ?></td>
            <td><?php echo $row['Alamat']; ?></td>
            <td><?php echo $row['Kepakaran']; ?></td>
            <td>
              <a href="edit_dosen.php?kodeDosen=<?php echo $row['KodeDosen']; ?>">Edit</a> |
              <a href="delete_dosen.php?kodeDosen=<?php echo $row['KodeDosen']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="8">Tidak ada data dosen.</td>
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
$conn->close(); // Tutup koneksi
?>
