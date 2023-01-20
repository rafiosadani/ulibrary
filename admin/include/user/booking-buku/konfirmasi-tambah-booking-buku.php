<?php 

    if(isset($_POST["submit"])) {
        $sql = "SELECT MAX(`peminjaman`.`kode_peminjaman`) as `kodePeminjaman` 
                FROM `peminjaman` 
                INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`status` = 'Booking'";

        $query = mysqli_query($koneksi, $sql);

        $data = mysqli_fetch_assoc($query);

        $kodePeminjaman = $data["kodePeminjaman"];

        $tanggal = substr($kodePeminjaman, 4, 8);

        if($tanggal === date('Ymd')) {
            $urutan = (int) substr($kodePeminjaman, 12, 4);

            $urutan++;

            $huruf = "BKPJ" . date('Ymd');

            $kodePeminjaman = $huruf . sprintf("%04s", $urutan);
        } else {
            $kodePeminjaman = "BKPJ" . date('Ymd') . "0001";
        }

        $id_buku = $_POST["id_buku"];

        $kode_peminjaman = $kodePeminjaman;
        $tgl_pinjam = $_POST["tgl_pinjam"];
        $tgl_kembali = $_POST["tgl_kembali"];
        $jumlah_buku = $_POST["jumlah_buku"];
        $id_user_peminjam = $_SESSION["id_user"];

        if(empty($kode_peminjaman)) {
            header("Location:index.php?include=detail-buku-booking&data=" . $id_buku . "&notif=kodePeminjamanKosong");
        } else if(empty($tgl_kembali)) {
            header("Location:index.php?include=detail-buku-booking&data=" . $id_buku . "&notif=tglKembaliKosong");
        } else if(empty($jumlah_buku)) {
            header("Location:index.php?include=detail-buku-booking&data=" . $id_buku . "&notif=jumlahBukuKosong");
        } else if($jumlah_buku <= 0) {
            header("Location:index.php?include=detail-buku-booking&data=" . $id_buku . "&notif=jumlahBukuSalah");
        } else {

            // query insert peminjaman
            $sql = "INSERT INTO `peminjaman`
                                (`kode_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `jumlah_buku`, 
                                `id_user_peminjam`) 
                    VALUES ('$kode_peminjaman', '$tgl_pinjam', '$tgl_kembali', '$jumlah_buku', 
                            '$id_user_peminjam')";

            // insert data peminjaman
            mysqli_query($koneksi, $sql);

            if(mysqli_affected_rows($koneksi) > 0) {
                
                $id_buku = $_POST["id_buku"];
                $status = "Booking";
                $denda_telat = 0;
                $denda_buku = 0;
                $total_denda = 0;

                // query insert detail peminjaman
                $sql2 = "INSERT INTO `detail_peminjaman`
                            (`kode_peminjaman`, `id_buku`, `jumlah_buku`, `status`, 
                            `denda_telat`, `denda_buku`, `total_denda`) 
                VALUES ('$kode_peminjaman', '$id_buku', '$jumlah_buku', 
                        '$status', '$denda_telat', '$denda_buku', '$total_denda')";
                
                // insert data detail peminjaman
                mysqli_query($koneksi, $sql2);

                if(mysqli_affected_rows($koneksi) > 0) {
                    header("Location:index.php?include=peminjaman-buku-users&notif=bookingBerhasil");
                }
            }       
        }
    }

?>