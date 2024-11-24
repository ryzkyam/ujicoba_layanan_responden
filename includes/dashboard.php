<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Dosen dan Mahasiswa</title>
  <link rel="stylesheet" href="../assets/css-dashboard.css" />
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
        <li><a href="../src/Respondent.php"><i class="fas fa-upload"></i> Upload PDF</a></li>
        <li><a href="../src/profil.php"><i class="fas fa-user"></i> Profil</a></li>
        <li><a href="../home/login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </aside>

    <!-- Konten Utama -->
    <main>
      <header class="header">
        <h1>Dashboard Data Mahasiswa</h1>
      </header>

      <?php
      $data = [
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
        [
          'image' => 'https://tse3.mm.bing.net/th?id=OIP.7ye32I5fpYFtzTxGWzbFDwHaLG&pid=Api&P=0&h=180',
          'title' => 'Shoes!',
          'description' => 'If a dog chews shoes whose shoes does he choose?',
        ],
      ];
      ?>
      
      <div class="filtering">
        <input type="text" name="filtering" placeholder="Masukan Npm Mahasiswa" value="">
        <input type="submit" name="submit" id="submit">
      </div>
      <div class="flex-container">
        <?php foreach ($data as $product): ?>
          <div class="card">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" />
            <div class="card-body">
              <h2><?php echo $product['title']; ?></h2>
              <p><?php echo $product['description']; ?></p>
              <div class="mt-2">
                <button>Lihat Detail</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </main>
  </div>

  <!-- Toggle button untuk sidebar di perangkat kecil -->
  <span class="menu-toggle" onclick="toggleSidebar()"><i class="fas fa-bars"></i></span>

  <footer>