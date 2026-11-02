<?php
// 1. Mengambil data yang dikirim dari form HTML
$kecamatan       = $_POST['kecamatan'];
$longitude       = $_POST['longitude'];
$latitude        = $_POST['latitude'];
$luas            = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// 2. Konfigurasi koneksi ke database MySQL
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "penduduk";

// 3. Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// 4. Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// 5. Query INSERT lengkap dengan longitude & latitude
$sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk) 
        VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

// 6. Eksekusi query
if ($conn->query($sql) === TRUE) {
    // Kembali ke index.php di folder utama (di luar folder input)
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>