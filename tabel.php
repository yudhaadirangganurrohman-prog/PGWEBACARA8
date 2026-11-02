
<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "penduduk");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel penduduk
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penduduk</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 18px;
        }

        table {
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            border: 1px solid #888;
            padding: 5px;
        }

        th {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        td {
            font-size: 18px;
        }

        .angka {
            text-align: right;
        }

        a {
            color: #5555a0;
        }
    </style>
</head>

<body>

    <a href="input.php">Input</a>

    <table border="1">
        <tr>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas</th>
            <th>Jumlah Penduduk</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?= htmlspecialchars($row['kecamatan']) ?></td>

            <td><?= htmlspecialchars($row['longitude']) ?></td>

            <td><?= htmlspecialchars($row['latitude']) ?></td>

            <td><?= htmlspecialchars($row['luas']) ?></td>

            <td class="angka">
                <?= number_format((int)$row['jumlah_penduduk'], 0, ',', '') ?>
            </td>

            <td>
                <a href="hapus.php?id=<?= urlencode($row['id']) ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   hapus
                </a>
            </td>

            <td>
                <a href="edit.php?id=<?= urlencode($row['id']) ?>">
                   edit
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
            echo "<tr><td colspan='7'>Data belum tersedia</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
