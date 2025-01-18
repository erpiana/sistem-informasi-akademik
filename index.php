<?php
include 'database_pia.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda - Sistem Akademik</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <!-- Header -->
  <header>
    <h2>Selamat Datang di Sistem Akademik Erpiana</h2>
  </header>

  <!-- Menu Navigasi -->
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="?page=mahasiswa">Mahasiswa</a></li>
      <li><a href="?page=dosen">Dosen</a></li>
      <li><a href="?page=matakuliah">Mata Kuliah</a></li>
      <li><a href="?page=departemen">Departemen</a></li>
      <li><a href="?page=fakultas">Fakultas</a></li>
      <li><a href="?page=programstudi">Program Studi</a></li>
      <li><a href="?page=semester">Semester</a></li>
      <li><a href="?page=penelitian">Penelitian</a></li>
    </ul>
  </nav>

  <!-- Body Konten -->
  <div class="content">
    <?php
      // Menampilkan konten dinamis sesuai dengan pilihan
      if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch($page) {
          case 'mahasiswa':
            include 'mahasiswa.php';
            break;
          case 'dosen':
            include 'dosen.php';
            break;
          case 'matakuliah':
            include 'matakuliah.php';
            break;
          case 'departemen':
            include 'departemen.php';
            break;
          case 'fakultas':
            include 'fakultas.php';
            break;
          case 'programstudi':
            include 'programstudi.php';
            break;
          case 'semester':
            include 'semester.php';
            break;
          case 'penelitian':
            include 'penelitian.php';
            break;
          default:
            echo "<h3>Di sini, Anda dapat mengelola data akademik dengan cepat dan mudah. </h3>";
        }
      } else {
        echo "<h3>Di sini, Anda dapat mengelola data akademik dengan cepat dan mudah.</h3>";
      }
    ?>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 22343004_Erpiana Informatika FT UNP 2024</p>
  </footer>

</body>
</html>
