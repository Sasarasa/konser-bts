<?php
include "koneksi.php";
$dayaa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT*FROM daya where id_daya='$_GET[id_daya]'"));
$d = array(
  'va'      =>  $dayaa['va'],
  'harga'     =>  $dayaa['harga'],
);
echo json_encode($d);
