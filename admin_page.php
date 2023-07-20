<?php
session_start();

@include 'config.php';

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
   exit();
}
?>
<div class="container">

<div class="content">
   <h3>hi, <span>Admin</span></h3>
   <h1>Selamat <span><?php echo $_SESSION['admin_name'] ?></span></h1>
   <p>Di Halaman ADMIN</p>

   <form action="save_concerts.php" method="POST">
   <label for="nama">Nama Konser:</label>
   <input type="text" name="nama" id="nama" required><br>

   <label for="tempat">Tempat:</label>
   <input type="text" name="tempat" id="tempat" required><br>

   <label for="tanggal">Tanggal:</label>
   <input type="date" name="tanggal" id="tanggal" required><br>

   <label for="jam">Jam:</label>
   <input type="time" name="jam" id="jam" required><br>

   <label for="harga">Harga Tiket:</label>
   <input type="text" name="harga" id="harga" required><br>

   <input type="submit" value="Save Concert">
</form>

<a href="tampilkan_admin.php" class="btn">Tampilkan Data Konser</a>

<script>
   document.getElementById('harga').addEventListener('input', function(e) {
      var harga = e.target.value;

      harga = harga.replace(/[^0-9]/g, '');

      harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

      e.target.value = harga;
   });
</script>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
>
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
