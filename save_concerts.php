<?php
session_start();

require_once 'config.php';

if (!isset($_SESSION['admin_name'])) {
   header('location: login_form.php');
   exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nama = $_POST['nama'];
   $tempat = $_POST['tempat'];
   $tanggal = $_POST['tanggal'];
   $jam = $_POST['jam'];
   $harga = $_POST['harga'];

   $koneksi = mysqli_connect('localhost','root','','test');
   if (!$koneksi) {
      die("Koneksi ke database gagal: " . mysqli_connect_error());
   }

   $query = "INSERT INTO conserts (nama, tempat, tanggal, jam, harga) VALUES ('$nama', '$tempat', '$tanggal', '$jam', '$harga')";
   $result = mysqli_query($koneksi, $query);

   if ($result) {
      $message = 'Concert saved successfully.';
   } else {
      $message = 'Error: ' . mysqli_error($koneksi);
   }

   mysqli_close($koneksi);
}
?>
<head>
   <link rel="stylesheet" href="css/save2.css">
</head>

<div class="container">
   <?php if (isset($message)) : ?>
      <div class="success-message"><?php echo $message; ?></div>
   <?php endif; ?>
   <a href="admin_page.php" class="btn">Kembali</a>
</div>

<script>
   setTimeout(function() {
      var successMessage = document.querySelector('.success-message');
      successMessage.style.display = 'none';
   }, 3000);
</script>