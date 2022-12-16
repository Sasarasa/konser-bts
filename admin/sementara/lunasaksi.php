
<?php
        $sql_ubah = "UPDATE pembayaran SET
            status_bayar='Lunas'
            WHERE id_pembayaran ='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

            $sql_cek = "SELECT * FROM pembayaran WHERE id_pembayaran='".$_GET['kode']."'";
            $query_cek = mysqli_query($koneksi, $sql_cek);
            $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
            $id=$data_cek['id_pemesanan'];

        $sql_ubah2 = "UPDATE produksi SET
            Proses='Produksi'
            WHERE id_pemesanan ='$id'";
        $query_ubah2 = mysqli_query($koneksi, $sql_ubah2);

        if ($query_ubah2) {
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=riwayatbayar&kode=$id'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=pesan'>";
        }
        //selesai proses ubah

?>