
<?php
        $sql_ubah = "UPDATE produksi SET
            proses='Menunggu Konfirmasi'
            WHERE id_produksi ='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if ($query_ubah) {
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=pesan'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=pesan'>";
        }
        //selesai proses ubah

?>