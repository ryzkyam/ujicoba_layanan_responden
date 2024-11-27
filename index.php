<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
  <div class="form-container">
    <!-- Login Form -->
    <div class="login-card">
      <h2 class="title">Login</h2>
      <form>
        <div class="input-container">
          <label for="role">Login as:</label>
          <select id="role" name="role" onchange="handleRoleChange('login')">
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
          </select>
        </div>
        <div class="input-container">
          <label id="id-label-login" for="identifier-login">NSN</label>
          <input type="text" id="identifier-login" name="identifier" placeholder="Enter your NSN">
        </div>
        <div class="input-container">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="login-btn">
          Login
        </button>
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </form>
    </div>
    <script src="index.js"></script>
</body>

</html>