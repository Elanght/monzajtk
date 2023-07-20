<?php
session_start();

@include 'config.php';

if (isset($_GET['id'])) {
   $concertId = $_GET['id'];

   // Query untuk mendapatkan detail konser berdasarkan ID
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
   // Mengambil data yang diedit dari formulir
   $nama = $_POST['nama'];
   $tempat = $_POST['tempat'];
   $tanggal = $_POST['tanggal'];
   $jam = $_POST['jam'];
   $harga = $_POST['harga'];

   // Menghilangkan koma atau titik pada input harga sebelum disimpan ke database
   $harga = str_replace(',', '', $harga);

   // Query untuk memperbarui detail konser
   $updateQuery = "UPDATE conserts SET nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jam = '$jam', harga = '$harga' WHERE id = '$concertId'";
   $updateResult = mysqli_query($conn, $updateQuery);

   if ($updateResult) {
      echo 'Konser berhasil diperbarui.';
      // Redirect ke halaman daftar konser atau halaman detail konser yang diperbarui
      header('Location: tampilkan_admin.php');
      exit;
   } else {
      echo 'Terjadi kesalahan saat memperbarui konser.';
   }
}

?>

<!DOCTYPE html>
<html>
<head>
   <title>Edit Konser</title>
   <link rel="stylesheet" type="text/css" href="css/edit1.css">
   <script>
      function formatCurrency(input) {
         var currency = input.value.replace(/[^\d]/g, '');
         if (currency !== "") {
            currency = parseInt(currency, 10);
            input.value = currency.toLocaleString("id-ID");
         }
      }

      function unformatCurrency(input) {
         var currency = input.value.replace(/[^\d]/g, '');
         input.value = currency;
      }
   </script>
</head>
<body>
   <h2>Edit Konser</h2>
   <form method="POST">
      <label>Nama:</label>
      <input type="text" name="nama" value="<?php echo $concert['nama']; ?>" required><br>

      <label>Tempat:</label>
      <input type="text" name="tempat" value="<?php echo $concert['tempat']; ?>" required><br>

      <label>Tanggal:</label>
      <input type="date" name="tanggal" value="<?php echo $concert['tanggal']; ?>" required><br>

      <label>Jam:</label>
      <input type="time" name="jam" value="<?php echo $concert['jam']; ?>" required><br>

      <label>Harga:</label>
      <input type="text" name="harga" value="<?php echo $concert['harga']; ?>" oninput="formatCurrency(this)" onfocus="unformatCurrency(this)" required><br>

      <button type="submit">Simpan</button>
      <a href="tampilkan_admin.php?id=<?php echo $concert['id']; ?>" class="btn">Kembali</a>
   </form>>
</body>
</html>

<?php
mysqli_close($conn);
?>