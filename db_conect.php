<?php
$servername = "localhost"; // atau 127.0.0.1
$username = "root"; // ganti dengan username database Anda
$password = "ramadhan1900"; // ganti dengan password database Anda
$dbname = "responden_database"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
