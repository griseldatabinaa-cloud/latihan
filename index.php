<?php

include "config.php";

$data = file_get_contents($url_api);
$mahasiswa = json_decode($data, true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        a {
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 5px;
            color: white;
        }

        .edit {
            background: #2196F3;
        }

        .hapus {
            background: #f44336;
        }

        .tambah {
            display: inline-block;
            background: #4CAF50;
            margin-bottom: 10px;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Data Mahasiswa</h2>

    <a href="tambah.php" class="tambah">+ Tambah Data</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>WA</th>
            <th>EMail</th>
            <th>Aksi</th>
        </tr>

        <?php if (!empty($mahasiswa)): ?>

            <?php foreach ($mahasiswa as $mhs): ?>

                <tr>
                    <td><?= htmlspecialchars($mhs['ID']) ?></td>
                    <td><?= htmlspecialchars($mhs['Nama']) ?></td>
                    <td><?= htmlspecialchars($mhs['Kelas']) ?></td>
                    <td><?= htmlspecialchars($mhs['WA']) ?></td>
                    <td><?= htmlspecialchars($mhs['EMail']) ?></td>

                    <td>
                        <a
                            href="edit.php?id=<?= urlencode($mhs['ID']) ?>"
                            class="edit">
                            Edit
                        </a>

                        <a
                            href="hapus.php?id=<?= urlencode($mhs['ID']) ?>"
                            class="hapus"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="6">Data tidak ditemukan</td>
            </tr>

        <?php endif; ?>

    </table>

</div>

</body>
</html>