<?php
include "koneksi.php";
$nama = $_POST['nama'];
$pass = $_POST['password'];
$no = $_POST['no_hp'];
$karakter = '123456789';
$shuffle  = substr(str_shuffle($karakter), 0, 5);
$angka=$shuffle;
$tanggal = date("Y-m-d");
$koneksi->query("INSERT INTO tb_pelanggan(no_pelanggan, nama_pelanggan, nomor_hp, password) VALUES('ID$angka','$nama','$no','$pass')");
$koneksi->query("INSERT INTO tb_tiket(id_tiket, tgl_lobby, no_pelanggan, Konfirmasi) VALUES('TID$angka','$tanggal','ID$angka','Menunggu Konfirmasi')");
echo "<script>alert('Pendaftaran berhasil')</script>";
?>
<script>
    window.location.href = 'login.php';
</script>