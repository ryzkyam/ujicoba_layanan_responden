<?php
@include 'db_conect.php'; // Pastikan untuk menyertakan file koneksi database

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php'); // Redirect ke halaman login jika user_id tidak ada
    exit; // Hentikan eksekusi lebih lanjut
}

$user_id = $_SESSION['user_id'];

// Cek apakah pengguna sudah memiliki data bio_user
$check_bio = mysqli_query($conn, "SELECT * FROM `bio_user` WHERE `user_id` = '$user_id' LIMIT 1");

if (mysqli_num_rows($check_bio) == 0) {
    // Jika tidak ada data, masukkan data default
    $default_email = "default@example.com";
    $default_phone = "N/A";
    $default_address = "N/A";
    $default_bio = "This user has not provided a bio yet.";

    $insert_default = mysqli_query($conn, "INSERT INTO `bio_user`(`user_id`, `email`, `phone`, `address`, `bio`) VALUES ('$user_id', '$default_email', '$default_phone', '$default_address', '$default_bio')");
}

// Menampilkan data profil pengguna
$select_bio_user = mysqli_query($conn, "SELECT * FROM `bio_user` WHERE `user_id` = '$user_id' LIMIT 1");
$fetch_bio_user = mysqli_fetch_assoc($select_bio_user);

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    // Update data bio_user
    $update_bio = mysqli_query($conn, "UPDATE `bio_user` SET `email`='$email', `phone`='$phone', `address`='$address', `bio`='$bio' WHERE `user_id`='$user_id'");

    if ($update_bio) {
        echo '<p>Bio berhasil diperbarui!</p>';
    } else {
        echo '<p>Error: ' . mysqli_error($conn) . '</p>'; // Menampilkan pesan error jika query gagal
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Bio</title>
</head>
<body>
    <h2>Submit Bio</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($fetch_bio_user['email']); ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($fetch_bio_user['phone']); ?>" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required><?php echo htmlspecialchars($fetch_bio_user['address']); ?></textarea><br>

        <label for="bio">Bio:</label>
        <textarea name="bio" required><?php echo htmlspecialchars($fetch_bio_user['bio']); ?></textarea><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>