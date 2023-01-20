<?php 

    if(isset($_POST["submit"])) {
        $kategori_buku = htmlspecialchars($_POST["kategori_buku"]);
    
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(empty($kategori_buku)) {
            // cek apakah kategori buku sudah di isi atau belum
            header("Location:index.php?include=tambah-kategori-buku&notif=kategoriBukuKosong");
        } else if($error == 4) {
            // cek apakah user sudah pilih gambar atau belum
            header("Location:index.php?include=tambah-kategori-buku&notif=gambarKosong");
        } else if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // cek yang dipilih user gambar atau bukan
            header("Location:index.php?include=tambah-kategori-buku&notif=bukanGambar");
        } else if($ukuranFile > 2000000) {
            // cek jika ukuran gambar terlalu besar
            header("Location:index.php?include=tambah-kategori-buku&notif=gambarTerlaluBesar");
        } else {
            // lolos pengecekan, gambar siap di upload
            // generate nama gambar baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, '../dist/img/kategori-buku/' . $namaFileBaru);

            // query insert kategori buku
            $sql = "INSERT INTO `kategori_buku` (`kategori_buku`, `gambar`) VALUES ('$kategori_buku', '$namaFileBaru')";

            // insert data kategori buku
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=kategori-buku&notif=tambahBerhasil");
        }
    }

?>