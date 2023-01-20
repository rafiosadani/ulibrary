<?php 

    if(isset($_POST["submit"])) {
        
        $judul_buku = htmlspecialchars($_POST["judul_buku"]);
        $id_kategori_buku = htmlspecialchars($_POST["kategori_buku"]);
        $pengarang = htmlspecialchars($_POST["pengarang"]);
        $id_penerbit = htmlspecialchars($_POST["penerbit"]);
        $tahun_terbit = htmlspecialchars($_POST["tahun_terbit"]);
        $jumlah_halaman = htmlspecialchars($_POST["jumlah_halaman"]);
        $jumlah_buku = htmlspecialchars($_POST["jumlah_buku"]);
        $id_rak = htmlspecialchars($_POST["rak"]);
        $sinopsis = htmlspecialchars($_POST["sinopsis"]);
    
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(empty($judul_buku)) {
            // cek apakah judul buku sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=judulBukuKosong");
        } else if(empty($id_kategori_buku) || $id_kategori_buku == 0) {
            // cek apakah kategori buku sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=kategoriBukuKosong");
        } else if(empty($pengarang)) {
            // cek apakah pengarang sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=pengarangKosong");
        } else if(empty($id_penerbit) || $id_penerbit == 0) {
            // cek apakah penerbit sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=penerbitKosong");
        } else if(empty($tahun_terbit)) {
            // cek apakah tahun terbit sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=tahunTerbitKosong");
        } else if(empty($jumlah_halaman)) {
            // cek apakah jumlah halaman sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=jumlahHalamanKosong");
        } else if(!is_numeric($jumlah_halaman)) {
            // cek apakah jumlah halaman sudah di isi dengan angka
            header("Location:index.php?include=tambah-buku&notif=jumlahHalamanBukanAngka");
        } else if(empty($jumlah_buku)) {
            // cek apakah jumlah buku sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=jumlahBukuKosong");
        } else if(!is_numeric($jumlah_buku)) {
            // cek apakah jumlah buku sudah di isi dengan angka
            header("Location:index.php?include=tambah-buku&notif=jumlahBukuBukanAngka");
        } else if(empty($id_rak) || $id_rak == 0) {
            // cek apakah rak sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=rakKosong");
        } else if(empty($sinopsis)) {
            // cek apakah sinopsis sudah di isi atau belum
            header("Location:index.php?include=tambah-buku&notif=sinopsisKosong");
        } else if($error == 4) {
            // cek apakah user sudah pilih gambar atau belum
            header("Location:index.php?include=tambah-buku&notif=gambarKosong");
        } else if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // cek yang dipilih user gambar atau bukan
            header("Location:index.php?include=tambah-buku&notif=bukanGambar");
        } else if($ukuranFile > 2000000) {
            // cek jika ukuran gambar terlalu besar
            header("Location:index.php?include=tambah-buku&notif=gambarTerlaluBesar");
        } else {
            // lolos pengecekan, gambar siap di upload
            // generate nama gambar baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;

            // mengupload gambar baru
            move_uploaded_file($tmpName, '../dist/img/buku/' . $namaFileBaru);

            // query insert buku
            $sql = "INSERT INTO `buku` (`judul`, `id_kategori_buku`, `pengarang`, `id_penerbit`, `tahun_terbit`, `jumlah_halaman`,
                                        `sinopsis`, `jumlah_buku`, `gambar`, `id_rak`)
                    VALUES ('$judul_buku', '$id_kategori_buku', '$pengarang', '$id_penerbit', '$tahun_terbit', '$jumlah_halaman', '$sinopsis', 
                            '$jumlah_buku', '$namaFileBaru', '$id_rak')";

            // insert data buku
            mysqli_query($koneksi, $sql);

            // apakah ada baris baru di table buku di database
            if(mysqli_affected_rows($koneksi) > 0) {
                header("Location:index.php?include=buku&notif=tambahBerhasil");
            }
        }
    }

?>