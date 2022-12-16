<?php
$host   = "localhost";
$user = "root";
$password = "";
$db = "dbkonser";

$koneksi =  mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno()) {
    echo 'Koneksi Gagal:' . mysqli_connect_error();
} else { }
error_reporting(0);
