<?php 

    if(isset($_GET['data'])) {
        $id_detail_peminjaman = $_GET['data'];

        $sql = "SELECT `detail_peminjaman`. `kode_peminjaman`, `detail_peminjaman`. `jumlah_buku`, `peminjaman`.`tgl_kembali` 
                FROM `detail_peminjaman` 
                INNER JOIN `peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`id_detail_peminjaman` = '$id_detail_peminjaman'";
        
        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $kode_peminjaman = $data["kode_peminjaman"];
            $jumlah_buku = $data["jumlah_buku"];
            $tgl_kembali = $data["tgl_kembali"];
        }

        $sql2 = "SELECT `denda`.`harga` 
                FROM `denda` 
                WHERE `denda`.`denda` = 'Buku Hilang'";

        $query2 = mysqli_query($koneksi, $sql2);

        while ($data2 = mysqli_fetch_assoc($query2)) {
            $harga_denda = $data2["harga"];
        }
            
        $keterangan_denda = "Buku Hilang";

        $denda_telat = 0;
        $denda_buku = $harga_denda * $jumlah_buku;
        $total_denda = $denda_buku + $denda_telat;
        

        $tgl_pengembalian = date('Y-m-d');

        $sql_update = "UPDATE `detail_peminjaman`
                        SET `detail_peminjaman`.`status` = 'Kembali', `detail_peminjaman`.`keterangan_denda` = '$keterangan_denda', 
                            `tgl_kembali` = '$tgl_pengembalian', `denda_telat` = '$denda_telat', `denda_buku` = '$denda_buku', `total_denda` = '$total_denda' 
                        WHERE `detail_peminjaman`.`id_detail_peminjaman` = '$id_detail_peminjaman'";

        mysqli_query($koneksi, $sql_update);
        
        if(mysqli_affected_rows($koneksi) > 0) {
            header("Location:index.php?include=pengembalian&notif=pengembalianBerhasil");
        }
    }

?>