<?php

@include 'db_conect.php';

session_start();

if (isset($_POST['submit'])) {

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_SPECIAL_CHARS);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $row = mysqli_fetch_assoc($select_users);

      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_id'] = $row['id'];

      header('location:dashboard.php');
   } else {
      $message[] = 'Incorrect email or password!';
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="./style.css">
</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '
      <div class="message">
         <span>' . $msg . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <section class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <input type="email" name="email" class="box" placeholder="Enter your email" required>
         <input type="password" name="pass" class="box" placeholder="Enter your password" required>
         <input type="submit" class="btn" name="submit" value="Login Now">
         <p>Don't have an account? <a href="register.php">Register now</a></p>
      </form>
   </section>

</body>

</html>