<?php
        $sql_ubah = "UPDATE tb_tiket SET
            konfirmasi='Check IN'
            WHERE id_tiket ='".$_GET['kode']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

        if ($query_ubah) {
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=tiketdata'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;  url=admin.php?page=tiketdata'>";
        }
        //selesai proses ubah

?>