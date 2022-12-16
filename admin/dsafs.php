<form method="post" enctype="multipart/form-data">
<section class="content-header">
      <h1>
        Daftar Booking
        <small>Control Travel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Control Booking</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking Travel</h3>
              
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nomor Invoice</th>
                  <th>Atas Nama</th>
                  <th>Plat</th>
                  <th>Nama Kendaraan</th>
                  <th>Waktu Pesanan</th>
                  <th>Tgl Pakai</th>
                  <th>Tgl Kembali</th>
                  <th>Lama</th>
                  <th>Jaminan</th>
                  <th>Tagihan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM travel_book, tb_pelanggan, tb_travel 
                    WHERE travel_book.id_travel=tb_travel.id_travel AND travel_book.id_akun=tb_pelanggan.id_akun";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                      $no++;
                      $invoice=$data['id_pstravel'];
                      $harga=$data['harga'];
                      $datein=$data['tgl_pakai'];
                      $dateout=$data['tgl_pulang'];
                      $waktuawal  = date_create($datein); //waktu di setting
                      $waktuakhir = date_create($dateout); //2019-02-21 09:35 waktu sekarang
                      $diff  = date_diff($waktuawal, $waktuakhir);
                      $tot_har=$diff->d;
                      $total=$harga*$tot_har;
                      $stts=$data['status'];
                ?>
                <tr>
                <td width="10px"><?= $no; ?></td>
                <td><?php echo $data['id_pstravel']; ?></td>
                    <td><?php echo $data['nm_pelanggan']; ?></td>
                    <td><?php echo $data['nomor_kendaraan']; ?></td>
                    <td><?php echo $data['nm_kendaraan']; ?></td>
                    <td><?php echo $data['tgl_pesan']; ?> -- <?php echo $data['time']; ?></td>
                    <td><?php echo $data['tgl_pakai']; ?></td>
                    <td><?php echo $data['tgl_pulang']; ?></td>
                    <td><?php echo $diff->d; ?></td>
                    <td><?php echo $data['jaminan']; ?></td>
                    <td><?php echo $total; ?></td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn bg-olive btn-xs"><?php echo $data['status']; ?></button>
                          <button type="button" class="btn bg-olive btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=travelaksikonfirmasi&kode=<?php echo $data['id_pstravel']; ?>">Menunggu Konfirmasi</a></li>
                              <li><a href="?page=travelaksiproses&kode=<?php echo $data['id_pstravel']; ?>">Proses</a></li>
                              <li><a href="?page=travelaksiselesai&kode=<?php echo $data['id_pstravel']; ?>">Selesai</a></li>
                              <li><a href="?page=travelaksibatal&kode=<?php echo $data['id_pstravel']; ?>">Batal</a></li>
                          </ul>
                        </div>
                    </td>
                    <td>
                    <?php
                        if($data['status']=='Proses'){
                    ?>      
                             <a href="?page=riwayatbayartravel&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs' class='btn btn-xs'> Riwayat Pembayaran</a> 
                    <?php
                        } else if($data['status'] =='Selesai'){
                    ?>
                       <a href="?page=riwayatbayartravel&kode=<?php echo $invoice; ?>" class='btn btn-primary btn-xs'> Riwayat Pembayaran</a>
                    <?php
                        } else if($data['status'] =='Menunggu Konfirmasi' ){
                    ?>
                          <a class='btn btn-default btn-xs disabled'> Riwayat Pembayaran</a>
                        
                    <?php
                        } else if($data['status'] =='Batal'){
                    ?>
                            <a class='btn btn-default btn-xs disabled'> Riwayat Pembayaran</a> 
                    <?php
                      } 
                    ?>
                      
                        <a href="admin.php?page=jaminanedit&kode=<?php echo $data['id_pstravel']; ?>" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i></a>
                        <?php
                        if($data['status']=='Selesai'){
                        ?>      
                             <a href="cetaktravel.php?kode=<?php echo $data['id_pstravel']; ?>" class='btn btn-success btn-xs' target='_BLANK'><i class="fa fa-print"></i></a>
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