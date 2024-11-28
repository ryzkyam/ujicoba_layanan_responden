 <?php
  @include 'db_conect.php'; // Pastikan nama file koneksi benar

  session_start();

  $username = $_SESSION['user_id']; // Mengambil user_id dari session

  if (!isset($username)) {
    header('location:login.php'); // Redirect ke halaman login jika user_id tidak ada
  }

  // Menampilkan data profil pengguna
  // Mengambil data pengguna berdasarkan user_id yang ada di session
  $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$username' LIMIT 1") or die('query failed');

  if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user); // Ambil data pengguna
  ?>


 <?php
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
           <li><a href="#">Logout</a></li>
         </ul>
       </nav>
     </aside>
     <main class="profile-content">
       <section class="profile-header">
         <div class="profile-image">
           <img src="https://imgx.parapuan.co/file/parapuan/desktop/crop/0x0:0x0/700x465/photo/2023/01/27/karinajpg-20230123020721jpg-20230127122335.jpg" alt="Profile Picture">
         </div>
         <div class="profile-info">
           <h2><?php echo $fetch_user['npm']; ?></h2>
           <h2><?php echo $fetch_user['name']; ?></h2>
           <button class="edit-profile-btn">Edit Profile</button>
         </div>
       </section>
       <section class="profile-details">
         <div class="detail">
           <h3>Email</h3>
           <p>john.doe@example.com</p>
         </div>
         <div class="detail">
           <h3>Phone</h3>
           <p>+123 456 7890</p>
         </div>
         <div class="detail">
           <h3>Address</h3>
           <p>1234 Elm Street, City, Country</p>
         </div>
         <div class="detail">
           <h3>Bio</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
         </div>
         <!-- Modal Edit Profile -->
       </section>
     </main>
   </div>
 </body>


 </html>