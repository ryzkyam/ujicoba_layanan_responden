<?php
session_start();
require_once "datas.php"; // Menghubungkan ke database

if (isset($_POST['registerBtn'])) {
    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']); // Menggunakan 'identifier' bukan 'indetifier'
    $name = mysqli_real_escape_string($conn, $_POST['name']); // Nama
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $errors = [];

    // Memeriksa apakah semua field diisi
    if ($identifier == '' or $name == '' or $password == '' or $confirm_password == '') {
        array_push($errors, "All fields are required");
    }

    // Memeriksa apakah NPM/NPD sudah terdaftar (anggap identifier ini bisa mahasiswa atau dosen)
    if ($identifier != '') {
        $userCheck = mysqli_query($conn, "SELECT identifier FROM users WHERE identifier='$identifier'");
        if ($userCheck) {
            if (mysqli_num_rows($userCheck) > 0) {
                array_push($errors, "NPM/NPD already registered");
            }
        } else {
            array_push($errors, "Something Went Wrong!");
        }
    }

            // Memeriksa apakah password dan konfirmasi password cocok
    if ($password != $confirm_password) {
        array_push($errors, "Passwords do not match");
    }

    // Jika ada error, kembali ke halaman register
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    // Menggunakan password hash untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data ke tabel users (identifier dan nama saja)
    $query = "INSERT INTO users (identifier, name, password) VALUES ('$identifier', '$name', '$hashed_password')";
    $userResult = mysqli_query($conn, $query);

    if ($userResult) {
        $_SESSION['message'] = "Registered Successfully";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: register.php');
        exit();
    }
}
