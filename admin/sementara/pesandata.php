<form method="post" enctype="multipart/form-data">
<section class="content-header">
      <h1>
        Daftar Pesanan
        <small>Control Pesanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Control Pesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pesanan Printing</h3>
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No Invoice</th>
                  <th>Nama Pesanan</th>
                  <th>Nama Pemesanan</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Status Pesanan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM pemesanan, pl, pelanggan, produksi WHERE pelanggan.id_akun=pemesanan.id_akun 
                    AND pl.id_daftar=pemesanan.id_daftar AND pemesanan.id_pemesanan=produksi.id_pemesanan";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                      $no++;
                      $invoice=$data['id_pemesanan'];
                ?>
                <tr>
                    <td width="10px"><?= $no; ?></td>
                    <td><?php echo $data['id_pemesanan']; ?></td>
                    <td><?php echo $data['nm_pesanan']; ?></td>
                    <td>(<?php echo $data['id_akun']; ?>) <?php echo $data['nm_pelanggan']; ?></td>
                    <td>Rp <?php echo number_format($data['harga']); ?></td>
                    <td><?php echo $data['jml_pesanan']; ?></td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn bg-olive btn-xs"><?php echo $data['proses']; ?></button>
                          <button type="button" class="btn bg-olive btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=aksikonfirmasi&kode=<?php echo $data['id_pemesanan']; ?>">Menunggu Konfirmasi</a></li>
                              <li><a href="?page=aksiproses&kode=<?php echo $data['id_pemesanan']; ?>">Proses</a></li>
                              <li><a href="?page=aksiproduksi&kode=<?php echo $data['id_pemesanan']; ?>">Produksi</a></li>
                              <li><a href="?page=aksiselesai&kode=<?php echo $data['id_pemesanan']; ?>">Selesai</a></li>
                              <li><a href="?page=aksibatal&kode=<?php echo $data['id_pemesanan']; ?>">Batal</a></li>
                          </ul>
                        </div>
                    </td>
                    <td>
                    <?php
                        if($data['proses']=='Proses'){
                    ?>      
                             <a href="?page=riwayatbayar&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs' class='btn btn-xs'> Riwayat Pembayaran</a> 
                    <?php
                        } else if($data['proses'] =='Selesai'){
                    ?>
                       <a href="?page=riwayatbayar&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs'> Riwayat Pembayaran</a>
                    <?php
                        } else if($data['proses'] =='Menunggu Konfirmasi' ){
                    ?>
                          <a class='btn btn-default btn-xs disabled'> Riwayat Pembayaran</a>
                        
                    <?php
                        } else if($data['proses'] =='Batal'){
                    ?>
                            <a class='btn btn-default btn-xs disabled'> Riwayat Pembayaran</a> 
                    <?php
                      } else if($data['proses'] =='Produksi'){
                    ?>
                           <a href="?page=riwayatbayar&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs'> Riwayat Pembayaran</a>
                    <?php
                      } else if($data['proses'] =='Produksi Done'){
                    ?>
                          <a href="?page=riwayatbayar&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs'> Riwayat Pembayaran</a>
                    <?php
                      }
                    ?>
             
                        <a href="admin.php?page=editharga&kode=<?php echo $data['id_pemesanan']; ?>" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i></a>
                        <?php
                        if($data['proses']=='Selesai'){
                        ?>      
                             <a href="cetak.php?kode=<?php echo $data['id_pemesanan']; ?>" class='btn btn-success btn-xs' target='_BLANK'><i class="fa fa-print"></i></a>
                        <?php
                        }
                        ?>
                        
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
</form>