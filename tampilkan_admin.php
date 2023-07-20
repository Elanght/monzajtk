<?php
session_start();

@include 'config.php';
$query = "SELECT * FROM conserts";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
   <title>Tampilkan Konser yang Tersedia</title>
   <link rel="stylesheet" type="text/css" href="css/tampilkan.css">
</head>
<body style="background-size: 100% auto;">
   <div class="concert-list">
     <h2>Konser yang Tersedia:</h2>
      <?php
if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="concert-post">';
      echo '<h4>' . $row['nama'] . '</h4>';
      echo '<p>Tempat: ' . $row['tempat'] . '</p>';
      echo '<p>Tanggal: ' . $row['tanggal'] . '</p>';
      echo '<p>Jam: ' . $row['jam'] . '</p>';
      echo '<p>Harga: ' . $row['harga'] . '</p>';
      echo '<a href="edit_concert.php?id=' . $row["id"] . '" class="btn">Edit</a>';
      echo '<a href="delete_concert.php?id=' . $row["id"] . '" class="btn">Hapus</a>';
      echo '</div>';
   }
} else {
         echo 'Tidak ada Konser yang Tersedia.';
      }
      ?>
   </div>

   <a href="admin_page.php" class="btn">Kembali</a>
</body>
</html>

<?php
mysqli_close($conn);
?>