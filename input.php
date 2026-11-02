<?php
$kecamatan = $_POST['kecamatan'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "penduduk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO penduduk (kecamatan, luas, jumlah_penduduk) 
        VALUES ('$kecamatan', '$luas', '$jumlah_penduduk')";

if ($conn->query($sql) === TRUE) {
    // Redirect kembali ke index utama
    header("Location: /pgweb8/index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>