<?php 

    if(isset($_POST["submit"])) {
        
        $id_buku = $_POST["id_buku"];
        $judul_buku = htmlspecialchars($_POST["judul_buku"]);
        $id_kategori_buku = htmlspecialchars($_POST["kategori_buku"]);
        $pengarang = htmlspecialchars($_POST["pengarang"]);
        $id_penerbit = htmlspecialchars($_POST["penerbit"]);
        $tahun_terbit = htmlspecialchars($_POST["tahun_terbit"]);
        $jumlah_halaman = htmlspecialchars($_POST["jumlah_halaman"]);
        $jumlah_buku = htmlspecialchars($_POST["jumlah_buku"]);
        $id_rak = htmlspecialchars($_POST["rak"]);
        $sinopsis = htmlspecialchars($_POST["sinopsis"]);
        $gambarLama = htmlspecialchars($_POST["gambarLama"]);
    
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(empty($judul_buku)) {
            // cek apakah judul buku sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=judulBukuKosong");
        } else if(empty($id_kategori_buku) || $id_kategori_buku == 0) {
            // cek apakah kategori buku sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=kategoriBukuKosong");
        } else if(empty($pengarang)) {
            // cek apakah pengarang sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=pengarangKosong");
        } else if(empty($id_penerbit) || $id_penerbit == 0) {
            // cek apakah penerbit sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=penerbitKosong");
        } else if(empty($tahun_terbit)) {
            // cek apakah tahun terbit sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=tahunTerbitKosong");
        } else if(empty($jumlah_halaman)) {
            // cek apakah jumlah halaman sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=jumlahHalamanKosong");
        } else if(!is_numeric($jumlah_halaman)) {
            // cek apakah jumlah halaman sudah di isi dengan angka
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=jumlahHalamanBukanAngka");
        } else if(empty($jumlah_buku)) {
            // cek apakah jumlah buku sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=jumlahBukuKosong");
        } else if(!is_numeric($jumlah_buku)) {
            // cek apakah jumlah buku sudah di isi dengan angka
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=jumlahBukuBukanAngka");
        } else if(empty($id_rak) || $id_rak == 0) {
            // cek apakah rak sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=rakKosong");
        } else if(empty($sinopsis)) {
            // cek apakah sinopsis sudah di isi atau belum
            header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=sinopsisKosong");
        } else {
            // jika user mengupload gambar baru
            if(!$error == 4) {
                if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                    // cek yang dipilih user gambar atau bukan
                    header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=bukanGambar");
                } else if($ukuranFile > 2000000) {
                    // cek jika ukuran gambar terlalu besar
                    header("Location:index.php?include=edit-buku&data=" . $id_buku . "&notif=gambarTerlaluBesar");
                } else {
                    // lolos pengecekan, gambar siap di upload
                    // generate nama gambar baru
                    $namaFileBaru = uniqid();
                    $namaFileBaru .= '.';
                    $namaFileBaru .= $ekstensiGambar;
                    
                    // mengupload gambar baru
                    move_uploaded_file($tmpName, '../dist/img/buku/' . $namaFileBaru);

                    // menghapus gambar lama
                    unlink("../dist/img/buku/$gambarLama");

                    // query update buku gambar baru
                    $sql = "UPDATE `buku`
                            SET `judul` = '$judul_buku', `id_kategori_buku` = '$id_kategori_buku', `pengarang` = '$pengarang', 
                                `id_penerbit` = '$id_penerbit', `tahun_terbit` = '$tahun_terbit', `jumlah_halaman` = '$jumlah_halaman', 
                                `sinopsis` = '$sinopsis', `jumlah_buku` = '$jumlah_buku', `gambar` = '$namaFileBaru', `id_rak` = '$id_rak' 
                            WHERE `id_buku` = '$id_buku'";

                    // update data buku gambar baru
                    mysqli_query($koneksi, $sql);

                    // apakah ada baris baru di table buku di database
                    if(mysqli_affected_rows($koneksi) > 0) {
                        header("Location:index.php?include=buku&notif=editBerhasil");
                    }
                }
            } else {
                // jika user tidak mengupload gambar baru
                // query update buku gambar lama
                $sql = "UPDATE `buku`
                        SET `judul` = '$judul_buku', `id_kategori_buku` = '$id_kategori_buku', `pengarang` = '$pengarang', 
                            `id_penerbit` = '$id_penerbit', `tahun_terbit` = '$tahun_terbit', `jumlah_halaman` = '$jumlah_halaman', 
                            `sinopsis` = '$sinopsis', `jumlah_buku` = '$jumlah_buku', `gambar` = '$gambarLama', `id_rak` = '$id_rak' 
                        WHERE `id_buku` = '$id_buku'";

                // update data buku gambar lama
                mysqli_query($koneksi, $sql);

                // apakah ada baris baru di table buku di database
                if(mysqli_affected_rows($koneksi) > 0) {
                    header("Location:index.php?include=buku&notif=editBerhasil");
                }
            }
        }
    }

?>