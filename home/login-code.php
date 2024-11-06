<?php
session_start();
require_once "datas.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];

    $errors = [];

    // Cek apakah identifier dan password diisi
    if (empty($identifier) || empty($password)) {
        array_push($errors, "All fields are required");
    }

    // Jika tidak ada error, lanjutkan verifikasi
    if (count($errors) == 0) {
        // Sesuaikan query berdasarkan peran (dosen atau mahasiswa)
        $query = "SELECT * FROM users WHERE identifier='$identifier' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedInStatus'] = true;
                $_SESSION['user'] = $user['name'];
                header('Location: index.php');
                exit();
            } else {
                array_push($errors, "Invalid password");
            }
        } else {
            array_push($errors, "User not found");
        }
    }

    // Menyimpan error ke session dan kembali ke login


    $_SESSION['errors'] = $errors;
    header('Location: login.php');
    exit();
}
