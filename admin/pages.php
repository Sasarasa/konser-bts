<?php
error_reporting(error_reporting() & ~E_NOTICE);
include "koneksi.php";

if ($_GET['page'] == "") {
  include "tiketdata.php";
} elseif ($_GET['page'] == "dashboard") {
  include "tiketdata.php";
} elseif ($_GET['page'] == "admin") {
  include "admindata.php";
} elseif ($_GET['page'] == "tiketdata") {
  include "tiketdata.php";
} elseif ($_GET['page'] == "tiketaksikonfirmasi") {
  include "tiketkonfirmasiaksi.php";
} elseif ($_GET['page'] == "tiketaksiproses") {
  include "tiketprosesaksi.php";
} elseif ($_GET['page'] == "tikethapus") {
  include "tikethapus.php";
} elseif ($_GET['page'] == "pelangganhapus") {
  include "pelangganhapus.php";
} elseif ($_GET['page'] == "pelanggan") {
  include "pelanggandata.php";
} 


