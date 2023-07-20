<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $error = array();

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   if (isset($error)) {
      foreach ($error as $errorMsg) {
         echo '<span class="error-msg">' . $errorMsg . '</span>';
      }
   }

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
         exit();
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
         exit();
      }
   } else {
      $error[] = 'Salah Memasukan email dan password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h1> Kelompok MONZA</h1>
      <h3>Login Sekarang</h3>
      <?php
      if (isset($error)) {
         foreach ($error as $errorMsg) {
            echo '<span class="error-msg">' . $errorMsg . '</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Sekarang" class="form-btn">
      <p>Belum mempunyai Akun? <a href="register_form.php">Daftar Sekarang</a></p>
   </form>
</div>

</body>
</html>