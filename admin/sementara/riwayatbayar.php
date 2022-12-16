<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM pemesanan WHERE id_pemesanan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    $id=$data_cek['id_pemesanan'];
    $jenis=$data_cek['jns_pemesanan'];
?>
<form method="post" enctype="multipart/form-data">
<section class="content-header">
      <h1>
        Riwayat Pembayaran
        <small>Control Pembayaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Control Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pembayaran <?php echo $id; ?></h3>
              <br><br>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
               if($jenis=='Pesanan Online'){
              ?>
              <a href="?page=pesan" class='btn btn-info btn-xs'> Kembali</a>
              <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No Pembayaran</th>
                  <th>No Invoice</th>
                  <th>Total Pembayaran</th>
                  <th>Bukti Pembayaran</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM pemesanan, pl, pelanggan, pembayaran WHERE pelanggan.id_akun=pemesanan.id_akun 
                    AND pl.id_daftar=pemesanan.id_daftar AND pemesanan.id_pemesanan=pembayaran.id_pemesanan AND pemesanan.id_pemesanan='$id'";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                      $no++;
                      $harga=$data['harga'];
                      $pesan=$data['jml_pesanan'];
                      $total=$harga*$pesan;
                ?>
                <tr>
                    <td width="10px"><?= $no; ?></td>
                    <td><?php echo $data['id_pembayaran']; ?></td>
                    <td><?php echo $data['id_pemesanan']; ?></td>
                    <td>Rp <?php echo number_format($total); ?></td>
                    <td width="100" height="100" alt="Foto"><img src="../bayar/<?php echo $data['bukti_bayar']?>" alt="Image"  width="100" height="100"></td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn bg-olive btn-xs"><?php echo $data['status_bayar']; ?></button>
                          <button type="button" class="btn bg-olive btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=aksilunas&kode=<?php echo $data['id_pembayaran']; ?>">Lunas</a></li>
                              <li><a href="?page=aksidp&kode=<?php echo $data['id_pembayaran']; ?>">DP</a></li>
                          </ul>
                        </div>
                    </td>
                    <td>
                        <a href="?page=aksiharga&kode=<?php echo $data['id_pemesanan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
              <?php
               } else if($jenis=='Pesanan Langsung'){
              ?>
              <a href="?page=pesan" class='btn btn-info btn-xs'> Kembali</a>
              <?php
                    $cekdata="SELECT id_pemesanan, sum(status_bayar='Lunas') as total FROM pembayaran WHERE id_pemesanan='$id'";
                    $querydata= mysqli_query($koneksi, $cekdata);
                    while ($hasile = mysqli_fetch_array($querydata,MYSQLI_BOTH)){
                    $hasil= $hasile['total'];
                    $idpesan=$hasile['id_pemesanan'];
                ?>
                    <?php
                        if($hasil==0){
                    ?>      
                             <a href="?page=pelunasan&kode=<?=$id?>" class='btn btn-info btn-xs'> Bayar</a>
                    <?php
                        } 
                    ?>
                <?php
                }
                ?>
                <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No Pembayaran</th>
                  <th>No Invoice</th>
                  <th>Total bayar</th>
                  <th>Pembayaran</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM pemesanan, pl, pelanggan, pembayaran WHERE pelanggan.id_akun=pemesanan.id_akun 
                    AND pl.id_daftar=pemesanan.id_daftar AND pemesanan.id_pemesanan=pembayaran.id_pemesanan AND pemesanan.id_pemesanan='$id'";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                      $no++;
                      $harga=$data['harga'];
                      $pesan=$data['jml_pesanan'];
                      $total=$harga*$pesan;
                ?>
                <tr>
                    <td width="10px"><?= $no; ?></td>
                    <td><?php echo $data['id_pembayaran']; ?></td>
                    <td><?php echo $data['id_pemesanan']; ?></td>
                    <td>Rp <?php echo number_format($total); ?></td>
                    <td>Rp <?php echo number_format($data['tot_bayar']); ?></td>
                    <td><?php echo $data['status_bayar']; ?></td>
                    <td>
                        <a href="?page=editharga&kode=<?php echo $data['id_pemesanan']; ?>" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i></a>
                        <a href="?page=aksiharga&kode=<?php echo $data['id_pemesanan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
              <?php
                }
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
</form>