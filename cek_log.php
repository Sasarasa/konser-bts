<?php
session_start();
if (isset($_SESSION['akun_username']))
    header("location: login.php");
include "koneksi.php"; /* PROSES LOGIN */
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password ='$password'");
    if (mysqli_num_rows($sql_login) > 0) {
        $row_akun = mysqli_fetch_array($sql_login);
        $_SESSION['user'] = $row_akun['id_user'];
        $_SESSION['akun_username'] = $row_akun['username'];

        header("location: index.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
}
