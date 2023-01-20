<?php 

    if(isset($_POST["submit"])) {
        
        $nama = htmlspecialchars($_POST["nama"]);
        $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $no_telp = htmlspecialchars($_POST["no_telp"]);
        $username = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);

        // enkripsi password menggunakan md5
        $password = md5($pass);
        
        $id_role = htmlspecialchars($_POST["role"]);
    
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(empty($nama)) {
            // cek apakah nama lengkap sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=namaKosong");
        } else if(empty($jenis_kelamin)) {
            // cek apakah jenis kelamin sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=jenisKelaminKosong");
        } else if(empty($alamat)) {
            // cek apakah alamat sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=alamatKosong");
        } else if(empty($no_telp)) {
            // cek apakah no telepon sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=noTelpKosong");
        } else if(!is_numeric($no_telp)) {
            // cek apakah no telepon sudah angka atau belum
            header("Location:index.php?include=tambah-users&notif=noTelpBukanAngka");
        } else if(empty($username)) {
            // cek apakah username sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=usernameKosong");
        } else if(empty($pass)) {
            // cek apakah password sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=passwordKosong");
        } else if(empty($id_role) || $id_role == 0) {
            // cek apakah role sudah di isi atau belum
            header("Location:index.php?include=tambah-users&notif=roleKosong");
        } else if($error == 4) {
            // cek apakah user sudah pilih foto atau belum
            header("Location:index.php?include=tambah-users&notif=gambarKosong");
        } else if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // cek yang dipilih user foto atau bukan
            header("Location:index.php?include=tambah-users&notif=bukanGambar");
        } else if($ukuranFile > 2000000) {
            // cek jika ukuran foto terlalu besar
            header("Location:index.php?include=tambah-users&notif=gambarTerlaluBesar");
        } else {
            // lolos pengecekan, foto siap di upload
            // generate nama foto baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;

            // mengupload foto baru
            move_uploaded_file($tmpName, 'assets/img/profile/' . $namaFileBaru);

            // query insert users baru
            $sql = "INSERT INTO `users` (`nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `password`, `foto`, `id_role`) 
                    VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$username', '$password', '$namaFileBaru', '$id_role')";

            // insert data users
            mysqli_query($koneksi, $sql);

            // apakah ada baris baru di table users di database
            if(mysqli_affected_rows($koneksi) > 0) {
                header("Location:index.php?include=users&notif=tambahBerhasil");
            } else {
                header("Location:index.php?include=tambah-users&notif=usernameSudahAda");
            }
        }
    }

?>