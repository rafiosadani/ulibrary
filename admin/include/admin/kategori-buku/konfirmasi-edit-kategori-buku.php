<?php 

    if(isset($_POST["submit"])) {
        $id_kategori_buku = $_POST["id_kategori_buku"];
        $kategori_buku = htmlspecialchars($_POST["kategori_buku"]);
        $gambarLama = $_POST["gambarLama"];

        
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(empty($kategori_buku)) {
            // cek apakah username sudah di isi atau belum
            header("Location:index.php?include=edit-kategori-buku&data=" . $id_kategori_buku . "&notif=kategoriBukuKosong");
        } else {
            // jika user mengupload gambar baru
            if(!$error == 4) {
                if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                    // cek yang dipilih user gambar atau bukan
                    header("Location:index.php?include=edit-kategori-buku&data=" . $id_kategori_buku . "&notif=bukanGambar");
                } else if($ukuranFile > 2000000) {
                    // cek jika ukuran gambar terlalu besar
                    header("Location:index.php?include=edit-kategori-buku&data=" . $id_kategori_buku . "&notif=gambarTerlaluBesar");
                } else {
                    // generate nama gambar baru
                    $namaFileBaru = uniqid();
                    $namaFileBaru .= '.';
                    $namaFileBaru .= $ekstensiGambar;

                    // mengupload gambar baru
                    move_uploaded_file($tmpName, '../dist/img/kategori-buku/' . $namaFileBaru);

                    // menghapus gambar lama
                    unlink("../dist/img/kategori-buku/$gambarLama");

                    // query update kategori buku gambar baru
                    $sql = "UPDATE `kategori_buku`
                            SET `kategori_buku` = '$kategori_buku', `gambar` = '$namaFileBaru' 
                            WHERE `id_kategori_buku` = '$id_kategori_buku'";

                    // update data kategori buku
                    mysqli_query($koneksi, $sql);

                    header("Location:index.php?include=kategori-buku&notif=editBerhasil");
                }
            } else {
                // jika user tidak mengupload gambar baru
                // query update kategori buku gambar lama
                $sql = "UPDATE `kategori_buku`
                        SET `kategori_buku` = '$kategori_buku', `gambar` = '$gambarLama' 
                        WHERE `id_kategori_buku` = '$id_kategori_buku'";

                // update data kategori buku
                mysqli_query($koneksi, $sql);

                header("Location:index.php?include=kategori-buku&notif=editBerhasil");
            }
        }
    }

?>