<?php
session_start();
if (isset($_SESSION['loggedInStatus'])) {
     header('Location: index.php');
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login & Register</title>
     <link rel="stylesheet" href='../assets/style.css'>
</head>

<body>
     <div class="form-container">
          <!-- Login Form -->
          <div class="login-card">
               <h2 class="title">Login</h2>
               <?php
               // Menampilkan pesan error jika ada
               if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
                    foreach ($_SESSION['errors'] as $error) {
                         echo "<div class='alert alert-warning'>{$error}</div>";
                    }
                    unset($_SESSION['errors']);
               }

               // Menampilkan pesan sukses jika ada
               if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
                    unset($_SESSION['message']);
               }
               ?>~
               <!-- Form Login -->
               <form action="login-code.php" method="POST">
                    <div class="input-container">
                         <label for="role">Login as:</label>
                         <select id="role" name="role" onchange="handleRoleChange('login')">
                              <option value="dosen">Dosen</option>
                              <option value="mahasiswa">Mahasiswa</option>
                         </select>
                    </div>

                    <div class="input-container">
                         <label id="id-label-login" for="identifier-login">NSN</label>
                         <input type="text" id="identifier-login" name="identifier" placeholder="Enter your NSN" required>
                    </div>

                    <div class="input-container">
                         <label for="password">Password</label>
                         <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Tombol Login tanpa tag <a> -->
                    <button type="submit" class="login-btn">Login</button>

                    <p>Don't have an account? <a href="register.php">Register</a></p>
               </form>
          </div>
     </div>

     <!-- Script untuk mengubah label sesuai role -->
     <script>
          function handleRoleChange(formType) {
               const roleSelect = document.getElementById('role');
               const identifierLabel = document.getElementById('id-label-login');
               const identifierInput = document.getElementById('identifier-login');

               if (roleSelect.value === 'dosen') {
                    identifierLabel.innerText = 'NPD (Nomor Pokok Dosen)';
                    identifierInput.placeholder = 'Enter your NPD';
               } else {
                    identifierLabel.innerText = 'NPM (Nomor Pokok Mahasiswa)';
                    identifierInput.placeholder = 'Enter your NPM';
               }
          }
     </script>

</body>

</html>