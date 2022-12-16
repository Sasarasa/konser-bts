<form action="?page=aksiadmin" method="post" enctype="multipart/form-data">
<section class="content-header">
      <h1>
        Pelanggan
        <small>Control Data Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->

         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Penonton Konser</h3>
              <br><br>
           
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Akun</th>
                  <th>Nama Pelanggan</th>
                  <th>Nomor HP</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql_tampil = "SELECT * FROM tb_pelanggan";
                    $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
                      $no++;
                ?>
                <tr>
                    <td width="10px"><?= $no; ?></td>
                    <td><?php echo $data['no_pelanggan']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['nomor_hp']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><a href="?page=pelangganhapus&kode=<?php echo $data['no_pelanggan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-xs'><i class="fa fa-trash"></i> Hapus</a></td>
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