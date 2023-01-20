<?php 

    if(isset($_POST["submit"])) {
        $kode_peminjaman = $_POST["kode_peminjaman"];
        $peminjam = htmlspecialchars($_POST["id_peminjam"]);
        $tgl_pinjam = $_POST["tgl_pinjam"];
        $tgl_kembali = $_POST["tgl_kembali"];
        $id_user_petugas = $_SESSION["id_user"];

        $judul = $_POST["judul"][0];
        $jumlah_buku = $_POST["jumlah_buku"][0];

        if(empty($peminjam) || $peminjam == 0) {
            header("Location:index.php?include=tambah-peminjaman&notif=peminjamKosong");
        } else if(empty($tgl_kembali)) {
            header("Location:index.php?include=tambah-peminjaman&notif=tglKembaliKosong");
        } else if(empty($judul)) {
            header("Location:index.php?include=tambah-peminjaman&notif=judulKosong");
        } else if(empty($jumlah_buku)) {
            header("Location:index.php?include=tambah-peminjaman&notif=jumlahBukuKosong");
        } else {
            if(isset($_POST["judul"])) {
                $totalJumlahBuku = 0;
                
                // menghitung jumlah buku
                foreach($_POST["jumlah_buku"] as $key => $jmlBuku) {
                    $totalJumlahBuku = $totalJumlahBuku + $jmlBuku;
                }

                // query insert peminjaman
                $sql = "INSERT INTO `peminjaman`
                                    (`kode_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `jumlah_buku`, 
                                    `id_user_peminjam`, `id_user_petugas`) 
                        VALUES ('$kode_peminjaman', '$tgl_pinjam', '$tgl_kembali', '$totalJumlahBuku', 
                                '$peminjam', '$id_user_petugas')";

                // insert data peminjaman
                mysqli_query($koneksi, $sql);

                if(mysqli_affected_rows($koneksi) > 0) {
                    
                    // looping insert detail peminjaman
                    foreach($_POST["judul"] as $index => $judulBuku) {
                        $id_buku = $judulBuku;
                        $jumlah_buku_detail = $_POST["jumlah_buku"][$index];
                        $status = "Pinjam";
                        $denda_telat = 0;
                        $denda_buku = 0;
                        $total_denda = 0;

                        // query insert detail peminjaman
                        $sql2 = "INSERT INTO `detail_peminjaman`
                                    (`kode_peminjaman`, `id_buku`, `jumlah_buku`, `status`, 
                                    `denda_telat`, `denda_buku`, `total_denda`) 
                        VALUES ('$kode_peminjaman', '$id_buku', '$jumlah_buku_detail', 
                                '$status', '$denda_telat', '$denda_buku', '$total_denda')";
                        
                        // insert data detail peminjaman
                        mysqli_query($koneksi, $sql2);

                    }

                    if(mysqli_affected_rows($koneksi) > 0) {
                        header("Location:index.php?include=peminjaman&notif=peminjamanBerhasil");
                    }

                }
                
            }
        }
    }

?>