<?php
session_start();

@include 'config.php';

if (isset($_GET['id'])) {
   $concertId = $_GET['id'];

   $query = "SELECT * FROM conserts WHERE id = '$concertId'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
      $concert = mysqli_fetch_assoc($result);
   } else {
      echo 'Konser tidak ditemukan.';
      exit;
   }
} else {
   echo 'ID konser tidak valid.';
   exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $deleteQuery = "DELETE FROM conserts WHERE id = '$concertId'";
   $deleteResult = mysqli_query($conn, $deleteQuery);

   if ($deleteResult) {
      echo 'Konser berhasil dihapus.';
      header('Location: tampilkan_admin.php');
      exit;
   } else {
      echo 'Terjadi kesalahan saat menghapus konser.';
   }
}

?>

<!DOCTYPE html>
<html>
<head>
   <title>Delete Concert</title>
   <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
   <h2>Hapus Konser</h2>
   <p>Apakah Anda yakin ingin menghapus konser ini?</p>
   <p>Nama: <?php echo $concert['nama']; ?></p>
   <p>Tempat: <?php echo $concert['tempat']; ?></p>
   <p>Tanggal: <?php echo $concert['tanggal']; ?></p>
   <p>Jam: <?php echo $concert['jam']; ?></p>
   <p>Harga: <?php echo $concert['harga']; ?></p>

<form method="POST">
   <button type="submit">Hapus</button>
   <a href="tampilkan_admin.php?id=<?php echo $concert['id']; ?>" class="btn">Kembali</a>
</form>
</body>
</html>

<?php
mysqli_close($conn);
?>
