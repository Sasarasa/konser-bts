<?php
session_start();

include "koneksi.php"; /* PROSES LOGIN */
$username = $_POST['hp'];
$password = $_POST['password'];
$sql_login = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE nomor_hp = '$username' AND password ='$password'");
if (mysqli_num_rows($sql_login) > 0) {
  $row_akun = mysqli_fetch_assoc($sql_login);
  if ($row_akun['nomor_hp'] == $username) {
    $_SESSION['user'] = $row_akun['no_pelanggan'];
    header("location: index.php");

  }else{
    header("location:login.php?pesan=gagal");
  }
}



