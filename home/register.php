<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div class="form-container">
    <div class="register-card">
      <h2 class="title">Register</h2>

      <!-- Menampilkan error jika ada -->
      <?php
      session_start();
      if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        foreach ($_SESSION['errors'] as $error) {
          echo "<div class='alert alert-warning'>{$error}</div>";
        }
        unset($_SESSION['errors']);
      }

      if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
      }
      ?>

      <!-- Form Register -->
      <form action="register.php" method="POST">
        <div class="input-container">
          <label for="role">Register as:</label>
          <select id="role" name="role">
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
          </select>
        </div>

        <div class="input-container">
          <label for="identifier">NPM/NPD</label>
          <input type="text" id="identifier" name="identifier" placeholder="Enter your NPM or NPD" required>
        </div>

        <div class="input-container">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="input-container">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="input-container">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
        </div>

        <button type="submit" name="registerBtn" class="register-btn">Register</button>

        <p>Already have an account? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</body>

</html>