<?php
$host = 'localhost'; // Atau alamat server database Anda
$username = 'root'; // Username MySQL
$password = ''; // Password MySQL, kosong jika belum diset
$database = 'blog'; // Nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
