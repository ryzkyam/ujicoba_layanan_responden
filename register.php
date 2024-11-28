<?php

@include 'db_conect.php';

if (isset($_POST['submit'])) {

  $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
  $name = mysqli_real_escape_string($conn, $filter_name);
  $filter_npm = filter_var($_POST['npm'], FILTER_SANITIZE_SPECIAL_CHARS);
  $npm = mysqli_real_escape_string($conn, $filter_npm);
  $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_SPECIAL_CHARS);
  $pass = mysqli_real_escape_string($conn, md5($filter_pass));
  $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_SPECIAL_CHARS);
  $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE npm = '$npm'") or die('query failed');

  if (mysqli_num_rows($select_users) > 0) {
    $message[] = 'User already exists!';
  } else {
    if ($pass != $cpass) {
      $message[] = 'Confirm password does not match!';
    } else {
      mysqli_query($conn, "INSERT INTO `users`(name, npm, password) VALUES('$name', '$npm', '$pass')") or die('query failed');
      $message[] = 'Registered successfully!';
      header('location:login.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">

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
      <h3>Register Now</h3>
      <input type="text" name="name" class="box" placeholder="Enter your username" required>
      <input type="number" name="npm" class="box" placeholder="Enter your npm" required>
      <input type="password" name="pass" class="box" placeholder="Enter your password" required>
      <input type="password" name="cpass" class="box" placeholder="Confirm your password" required>
      <input type="submit" class="btn" name="submit" value="Register Now">
      <p>Already have an account? <a href="login.php">Login now</a></p>
    </form>
  </section>

</body>

</html>