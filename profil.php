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
          <h1>Teteh Ina</h1>
          <p>Software Developer</p>
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