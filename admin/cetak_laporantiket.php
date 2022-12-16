<?php
include 'koneksi.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="logo.png">
  <title>Cetak Laporan Pesanan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/helper.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<div class="col-12">
    <p>
        <img height="70px" width="70px" src="" style="float: left;margin-left: 45px">
        <center><span style="font-size: 20px;"><b>KONSER TIKET</b></span></center>
    </p>
    <hr size="6px">
        <center><b>Laporan KONSER BTS</b>
            <hr width="25%">
            <?php
            $bulan = date('m');
            $tahun = date('Y');
            $nomor = "laporan/pesanan/".$bulan."/".$tahun;
            ?>
            Nomor Laporan : <?php echo $nomor;?><br></h4><br>
        </center>
        <center>
			<table border="1">
      <tr>
                <th>#</th>
                  <th>Number tiket</th>
                  <th>Nama Pelanggan</th>
                  <th>Nomor HP</th>
                  <th>Status Konfirmasin</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
               
               $sql_tampil = "SELECT * FROM tb_pelanggan, tb_tiket
               WHERE tb_pelanggan.no_pelanggan=tb_tiket.no_pelanggan";
               $query_tampil = mysqli_query($koneksi, $sql_tampil);
               while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                 $no++;
                      
                ?>
                <tr>
                <td width="10px"><?= $no++; ?></td>
                <td><?php echo $data['id_tiket']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['nomor_hp']; ?></td>
                    <td><?php echo $data['konfirmasi']; ?></td>
                        
                    </td>
                </tr>
                <?php
                }
                ?>
			</table>
		</center>
<div id="dir" class="row">
    <div style="margin-left:450px;">
        <br> Semarang, &nbsp;&nbsp;<?php echo date("d-m-Y"); ?><br />
        Pantia</div>
    <br />
    <br />
    <br />
    <div style="margin-left:450px;">
        Ahmad

    </div>
</div>
<script>
    window.print();
</script>