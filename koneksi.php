<?php
$host     = "localhost";
$user     = "root";
$password = ""; // biarkan kosong jika bawaan XAMPP
$database = "penduduk";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>