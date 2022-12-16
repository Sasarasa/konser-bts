<form method="post" enctype="multipart/form-data">
<section class="content-header">
  <h1>
        Daftar Tiket Penonton
        <small>Control tiket</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Control Tiket</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tiket Konser</h3>
              <br><br>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Number tiket</th>
                  <th>Nama Pelanggan</th>
                  <th>Nomor HP</th>
                  <th>Status Konfirmasin</th>
                  <th>Aksi</th>
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
                    <td width="10px"><?= $no; ?></td>
                    <td><?php echo $data['id_tiket']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['nomor_hp']; ?></td>
                    <td><?php echo $data['konfirmasi']; ?></td>
                    <td>
                    <div class="btn-group">
                          <button type="button" class="btn bg-olive btn-xs"><?php echo $data['konfirmasi']; ?></button>
                          <button type="button" class="btn bg-olive btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="?page=tiketaksikonfirmasi&kode=<?php echo $data['id_tiket']; ?>">Menunggu Konfirmasi</a></li>
                              <li><a href="?page=tiketaksiproses&kode=<?php echo $data['id_tiket']; ?>">Check In</a></li>
                          </ul>
                        </div>
                        <a href="?page=tikethapus&kode=<?php echo $data['id_tiket']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i> Hapus</a>
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