<?php
@include 'db_conect.php'; // Pastikan nama file koneksi benar

session_start();

$username = $_SESSION['user_id']; // Mengambil user_id dari session

if (!isset($username)) {
  header('location:login.php'); // Redirect ke halaman login jika user_id tidak ada
  exit; // Pastikan untuk menghentikan eksekusi lebih lanjut setelah redirect
}

// Menampilkan data profil pengguna
// Mengambil data pengguna berdasarkan user_id yang ada di session
$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$username' LIMIT 1") or die('query failed');
$select_bio_user = mysqli_query($conn, "SELECT * FROM `bio_user` WHERE `user_id` = '$username' LIMIT 1") or die('query failed' . mysqli_error($conn));

if (mysqli_num_rows($select_user) > 0) {
  $fetch_user = mysqli_fetch_assoc($select_user); // Ambil data pengguna
  $fetch_bio_user = mysqli_fetch_assoc($select_bio_user); // Ambil data bio pengguna

  // Menampilkan data
  if ($fetch_bio_user) { // Memastikan ada data bio_user
?>

<?php
  } else {
    echo '<p class="empty">Bio not found!</p>'; // Pesan jika data bio tidak ditemukan
    echo "User  ID: " . htmlspecialchars($username);
  }
} else {
  echo '<p class="empty">User  not found!</p>'; // Pesan jika pengguna tidak ditemukan
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Dashboard</title>
  <link rel="stylesheet" href="./profil.css">
</head>

<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Profil User</h2>
      <nav>
        <ul>
          <li><a href="./Uploadfile.php">Upload file</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="#">Notifications</a></li>
          <li><a href="./login.php">Logout</a></li>
        </ul>
      </nav>
    </aside>
    <main class="profile-content">
      <section class="profile-header">
        <div class="profile-image">
          <img src="https://tse1.mm.bing.net/th?id=OIP.9YHXM-aeJCLOUldfFewIGwAAAA&pid=Api&P=0&h=180" alt="Profile Picture">
        </div>
        <div class="profile-info">
          <h2><?php echo $fetch_user['npm']; ?></h2>
          <h2><?php echo $fetch_user['name']; ?></h2>
          <button class="edit-profile-btn"><a href="bioUser.php">edit profil</a></button>
        </div>
      </section>
      <section class="profile-details">
        <div class="detail">
          <h3>Email</h3>
          <h4><?php echo htmlspecialchars($fetch_bio_user['email']); ?></h4>
        </div>
        <div class="detail">
          <h3>Phone</h3>
          <h4><?php echo htmlspecialchars($fetch_bio_user['phone']); ?></h4>

        </div>
        <div class="detail">
          <h3>Address</h3>
          <h4><?php echo htmlspecialchars($fetch_bio_user['address']); ?></h4>
        </div>
        <div class="detail">
          <h3>Bio</h3>
          <h4><?php echo nl2br(htmlspecialchars($fetch_bio_user['bio'])); ?></h4>
        </div>
        <!-- Modal Edit Profile -->
      </section>
    </main>
  </div>
</body>


</html>