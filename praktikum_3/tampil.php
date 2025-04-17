<?php
include 'koneksi.php';
$query = "SELECT * FROM tb_pendaftaran";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta Didik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eeeeee;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: left;
            margin-left: 40px;
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold;
            color: #000;
        }

        table {
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: #000;
        }

        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
    <body>

        <h2>Data Peserta Didik</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>NIS/NISN</th>
                <th>Kelas</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
            </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['tanggal_lahir']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['no_hp']; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
