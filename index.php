<?php
include 'koneksi.php';

// Mengambil seluruh data dari tabel penduduk
$query = mysqli_query($koneksi, "SELECT * FROM penduduk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penduduk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-input {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .btn-input:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h2>Daftar Data Penduduk</h2>

    <!-- Gunakan link absolute path agar URL tidak menumpuk -->
    <a href="input/input.html" class="btn-input">Input Data Baru</a>
    <?php if (mysqli_num_rows($query) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas (km²)</th>
                <th>Jumlah Penduduk</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kecamatan']; ?></td>
                <td><?= $row['longitude']; ?></td>
                <td><?= $row['latitude']; ?></td>
                <td><?= $row['luas']; ?></td>
                <td><?= number_format($row['jumlah_penduduk']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else : ?>
        <p>Belum ada data penduduk.</p>
    <?php endif; ?>

</body>
</html>