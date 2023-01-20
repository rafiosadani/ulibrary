<?php 

    if(isset($_POST["submit"])) {
        $id_buku = $_POST["id_buku"];
        $kode_peminjaman = $_POST["kode_peminjaman"];
        $isi = htmlspecialchars($_POST["ulasan"]);
        $tgl_testimoni = date('Y-m-d');
        $id_user = $_SESSION["id_user"];

        if(empty($isi)) {
            // cek apakah ulasan sudah di isi atau belum (ulasan ada)
            header("Location:index.php?include=tambah-ulasan&data=" . $id_buku . "&data2=" . $kode_peminjaman . "&notif=ulasanKosong");
        } else {

            // query tambah ulasan
            $sql = "INSERT INTO `testimoni` (`tgl_testimoni`, `id_user`, `id_buku`, `isi`)  
                    VALUES ('$tgl_testimoni', '$id_user', '$id_buku', '$isi')";

            // tambah data ulasan
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=ulasan&notif=ulasanBerhasil");

        }

    }

?>