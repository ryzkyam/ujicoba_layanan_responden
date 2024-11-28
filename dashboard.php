<?php
@include 'db_conect.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Dosen dan Mahasiswa</title>
  <link rel="stylesheet" href="./dashboard.css" />
  <script>
    // JavaScript to toggle the sidebar
    const toggleBtn = document.querySelector('.toggle-btn');
    const sidebar = document.querySelector('.sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('open'); // Toggle the 'open' class
    });
  </script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>

  </style>
</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="./Uploadfile.php"><i class="fas fa-upload"></i> Upload PDF</a></li>
        <li><a href="./profil.php"><i class="fas fa-user"></i> Profil</a></li>
        <li><a href="./login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </aside>

    <!-- Konten Utama -->
    <main>
      <header class="header">
        <h1>Dashboard Data Mahasiswa</h1>
      </header>
      <div class="filtering">
        <input type="text" name="filtering" placeholder="Masukan Npm Mahasiswa" value="">
        <input type="submit" name="submit" id="submit">
      </div>
      <div class="flex-container">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        if (mysqli_num_rows($select_products) > 0) {
          while ($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
            <div class="card">
              <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="<?php echo $fetch_products['name']; ?>">
              <div class="card-body">
                <h2><?php echo $fetch_products['npm']; ?></h2>
                <h2><?php echo $fetch_products['name']; ?></h2>
                <p><?php echo $fetch_products['details']; ?></p>
                <div class="mt-2">
                  <button>Lihat Detail</button>
                </div>
              </div>
            </div>

        <?php
          }
        } else {
          echo '<p class="empty">No products added yet!</p>';
        }
        ?>

      </div>







  </div>

  </main>
  </div>

  <!-- Toggle button untuk sidebar di perangkat kecil -->
  <span class="menu-toggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></span>

  <footer>