<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

include 'config.php';

$query = "SELECT * FROM conserts";
$result = mysqli_query($conn, $query);

if (!$result) {
   die("Error: " . mysqli_error($conn));
}

if (isset($_POST['submit'])) {
   $concert_id = $_POST['concert_id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $ticket_quantity = $_POST['ticket_quantity'];

   if ($ticket_quantity == 0) {
      echo "Tidak dapat memesan tiket dengan jumlah nol.";
   } else {
      $order_number = generateRandomNumber();

      $selectOrder = "SELECT * FROM orders WHERE concert_id = '$concert_id' AND name = '$name' AND email = '$email'";
      $resultOrder = mysqli_query($conn, $selectOrder);

      if (mysqli_num_rows($resultOrder) > 0) {
         echo "Order already exists!<br>";
      } else {
         $insertOrder = "INSERT INTO orders (concert_id, name, email, ticket_quantity, order_number) VALUES ('$concert_id', '$name', '$email', '$ticket_quantity', '$order_number')";
         if (mysqli_query($conn, $insertOrder)) {
            echo "Pemesanan Berhasil!<br>";
            echo "Nomor Pemesanan: " . $order_number . "<br>";
            echo "Konser: " . getConcertName($conn, $concert_id) . "<br>";
            echo "Nama: " . $name . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Jumlah tiket: " . $ticket_quantity . "<br>";
         } else {
            echo "Error: " . mysqli_error($conn);
         }
      }
   }
}

function generateRandomNumber()
{
   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   $number = '';
   for ($i = 0; $i < 6; $i++) {
      $number .= $characters[rand(0, strlen($characters) - 1)];
   }
   return $number;
}

function getConcertName($conn, $concert_id)
{
   $query = "SELECT nama FROM conserts WHERE id = '$concert_id'";
   $result = mysqli_query($conn, $query);
   if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      return $row['nama'];
   }
   return "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <link rel="stylesheet" href="css/user.css">

</head>

<body >

   <div class="container" style="background-size:100% auto;">

      <div class="content">
         <p2>KELOMPOK MONZA</p2>
         <h3>hi, <span>user</span></h3>
         <h1>Selamat Datang <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>Di Halaman USER</p>

         <div class="concert-list">
            <h2>Konser yang Tersedia saat ini:</h2>
            <?php
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="concert-post">';
                  echo '<h4>' . $row['nama'] . '</h4>';
                  echo '<p>Tempat: ' . $row['tempat'] . '</p>';
                  echo '<p>Tanggal: ' . $row['tanggal'] . '</p>';
                  echo '<p>jam: ' . $row['jam'] . '</p>';
                  echo '<p>Harga: ' . $row['harga'] . '</p>';
                  echo '<form action="" method="post">';
                  echo '<input type="hidden" name="concert_id" value="' . $row['id'] . '">';
                  echo '<input type="text" name="name" placeholder="Your Name" required><br>';
                  echo '<input type="email" name="email" placeholder="Your Email" required><br>';
                  echo '<input type="number" name="ticket_quantity" placeholder="Ticket Quantity" required min="1"><br>';
                  echo '<input type="submit" name="submit" value="Order Now">';
                  echo '</form>';

                  echo '</div>';
               }
            } else {
               echo 'No concerts available.';
            }
            ?>
         </div>

         <a href="logout.php" class="btn">Logout</a>
      </div>

   </div>

</body>

</html>
