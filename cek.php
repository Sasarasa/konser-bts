<?php
// KONEKSI DATABASE
$servername = "localhost";
$user = "root";
$pass = "";
$db = "db_pln";

$connection = mysqli_connect($servername, $user, $pass, $db);

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// TAMPILKAN DATA BARANG DAN HARGA
$barang = mysqli_query($connection, "SELECT * FROM barang");
$jsArray = "var harga_brg = new Array();\n";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><strong>Menampilkan Field Otomatis Setelah Field Pertama Diisi</strong></title>
  <style type="text/css">
    .container {
      width: 300px;
      margin: auto;
      background-color: salmon;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    table,
    input,
    select {
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Penjualan</h1>
    <form name="autosumform" method="post" action="">
      <table>
        <tr>
          <td><label>Nama Barang</label></td>
          <td>
            <select name="kd_brg" onchange="changeValue(this.value)">
              <option>- Pilih -</option>
              <?php if (mysqli_num_rows($barang)) { ?>
                <?php while ($row_brg = mysqli_fetch_array($barang)) { ?>
                  <option value="<?php echo $row_brg["kd_brg"] ?>"> <?php echo $row_brg["va"] ?> </option>
                <?php $jsArray .= "harga_brg['" . $row_brg['kd_brg'] . "'] = {harga:'" . addslashes($row_brg['harga']) . "'};\n";
                } ?>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td><label>Harga</label></td>
          <td><input type="text" class="form-control" name="harga" id="harga" value="0" readonly="readonly"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
<script type="text/javascript">
  <?php echo $jsArray; ?>

  function changeValue(kd_brg) {
    document.getElementById("harga").value = harga_brg[kd_brg].harga;
  };
</script> <!-- Tampilkan Harga berdasarkan kode barang -->

</html>