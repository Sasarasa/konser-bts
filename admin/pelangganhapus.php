
<?php
        $sql_hapus = "DELETE FROM tb_pelanggan WHERE no_pelanggan='".$_GET['kode']."'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>alert('Hapus Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=admin.php?page=tiketdata'>";
        }else{
            echo "<script>alert('Hapus Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=admin.php?page=tiketdata'>";
        }
        //selesai proses ubah

?>