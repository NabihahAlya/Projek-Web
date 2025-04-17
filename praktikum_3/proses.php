<?php
include "koneksi.php";

$nama         = $_POST['nama'];
$nis          = $_POST['nis'];
$kelas        = $_POST['kelas'];
$tanggal_lahir= $_POST['tanggal_lahir'];
$alamat       = $_POST['alamat'];
$no_hp        = $_POST['no_hp'];

$query = "INSERT INTO tb_pendaftaran (nama, nis, kelas, tanggal_lahir, alamat, no_hp)
          VALUES ('$nama', '$nis', '$kelas', '$tanggal_lahir', '$alamat', '$no_hp')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dikirim!'); window.location.href='tampil.php';</script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
