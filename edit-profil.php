<?php
// Misalkan kita mendapatkan data dari database
// Contoh data pengguna
$user = [
     'email' => 'john.doe@example.com',
     'phone' => '+123 456 7890',
     'address' => '1234 Elm Street, City, Country',
     'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
];

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Ambil data dari formulir
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];
     $bio = $_POST['bio'];

     // Di sini Anda dapat menambahkan logika untuk memperbarui informasi di database
     // Misalnya menggunakan PDO atau MySQLi

     // Setelah memperbarui, Anda bisa mengalihkan pengguna ke halaman profil
     header("Location: profile.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Profile</title>
     <link rel="stylesheet" href="./profil.css">
</head>

<body>
     <div class="edit-profile">
          <h2>Edit Profile</h2>
          <form method="POST" action="">
               <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
               </div>
               <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
               </div>
               <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>
               </div>
               <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea name="bio" id="bio" required><?php echo htmlspecialchars($user['bio']); ?></textarea>
               </div>
               <button type="submit">Save Changes</button>
          </form>
     </div>
</body>

</html>