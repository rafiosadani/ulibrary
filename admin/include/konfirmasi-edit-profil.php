<?php
    if (isset($_SESSION['id_user'])) {
        if (isset($_POST["submit"])) {
            $id_user = $_POST["id_user"];
            $nama = htmlspecialchars($_POST['nama']);
            $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $no_telp = htmlspecialchars($_POST['no_telp']);
            $username = htmlspecialchars($_POST['username']);
            $passwordBaru = $_POST['password'];
            $passwordLama = $_POST['passwordLama'];
            $fotoLama = $_POST['fotoLama'];
            $password = "";

            $namaFile = $_FILES['foto']['name'];
            $ukuranFile = $_FILES['foto']['size'];
            $error = $_FILES['foto']['error'];
            $tmpName = $_FILES['foto']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'png', 'jpeg', 'gif', 'bmp'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if(empty($nama)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=namaKosong");
            } else if(empty($jenis_kelamin)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=jenisKelaminKosong");
            } else if(empty($alamat)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=alamatKosong");
            } else if(empty($no_telp)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=noTelpKosong");
            } else if(!is_numeric($no_telp)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=noTelpBukanAngka");
            } else if(empty($username)) {
                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=usernameKosong");
            } else {

                // jika user mengupload foto baru
                if(!$error == 4) {
                    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                        // cek yang dipilih user foto atau bukan
                        header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=bukanGambar");
                    } else if($ukuranFile > 2000000) {
                        // cek jika ukuran foto terlalu besar
                        header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=gambarTerlaluBesar");
                    } else {
                        // lolos pengecekan, foto siap di upload
                        // generate nama foto baru
                        $namaFileBaru = uniqid();
                        $namaFileBaru .= '.';
                        $namaFileBaru .= $ekstensiGambar;
                        
                        // mengupload foto baru
                        move_uploaded_file($tmpName, 'assets/img/profile/' . $namaFileBaru);

                        // menghapus foto lama
                        if($fotoLama != "default.jpg") {
                            unlink("assets/img/profile/$fotoLama");
                        }

                        // user mengisi password baru (mengganti password)
                        if (!empty($passwordBaru)) {
                            if($passwordLama === md5($passwordBaru)) {
                                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=passwordSama");
                            } else {
                                // enkripsi password baru
                                $password = md5($passwordBaru);

                                // query update data user gambar baru dan password baru
                                $sql = "UPDATE `users`
                                        SET `nama` = '$nama', `jenis_kelamin` = '$jenis_kelamin', `alamat` = '$alamat', 
                                            `no_telp` = '$no_telp', `username` = '$username', `password` = '$password', 
                                            `foto` = '$namaFileBaru' 
                                        WHERE `id_user` = '$id_user'";

                                // eksekusi sql
                                mysqli_query($koneksi, $sql);
                                
                                // cek jika user mengganti password maka akan diarahkan ke halaman login
                                if ($_SESSION['id_user'] == $id_user) {
                                    session_unset();
                                    header("Location:index.php?include=login&notif=loginUlang");
                                } else {
                                    // apakah ada baris baru di table user di database
                                    if(mysqli_affected_rows($koneksi) > 0) {
                                        header("Location:index.php?include=profil&notif=editBerhasil");
                                    } else {
                                        header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=usernameSudahAda");
                                    }
                                }
                            }
                        } else {
                            // password tidak diganti
                            $password = $passwordLama;

                            // query update data user gambar baru dan password lama
                            $sql = "UPDATE `users`
                            SET `nama` = '$nama', `jenis_kelamin` = '$jenis_kelamin', `alamat` = '$alamat', 
                                `no_telp` = '$no_telp', `username` = '$username', `password` = '$password', 
                                `foto` = '$namaFileBaru' 
                            WHERE `id_user` = '$id_user'";

                            // eksekusi sql
                            mysqli_query($koneksi, $sql);

                            // apakah ada baris baru di table user di database
                            if(mysqli_affected_rows($koneksi) > 0) {
                                header("Location:index.php?include=profil&notif=editBerhasil");
                            } else {
                                header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=usernameSudahAda");
                            }
                        }
                    }
                } else {
                    // jika user tidak mengupload gambar baru

                    // user mengisi password baru (mengganti password)
                    if (!empty($passwordBaru)) {
                        if($passwordLama === md5($passwordBaru)) {
                            header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=passwordSama");
                        } else {
                            // enkripsi password baru
                            $password = md5($passwordBaru);

                            // query update data user gambar lama dan password baru
                            $sql = "UPDATE `users`
                                    SET `nama` = '$nama', `jenis_kelamin` = '$jenis_kelamin', `alamat` = '$alamat', 
                                        `no_telp` = '$no_telp', `username` = '$username', `password` = '$password', 
                                        `foto` = '$fotoLama' 
                                    WHERE `id_user` = '$id_user'";

                            // eksekusi sql
                            mysqli_query($koneksi, $sql);
                            
                            // cek jika user mengganti password maka akan diarahkan ke halaman login
                            if ($_SESSION['id_user'] == $id_user) {
                                session_unset();
                                header("Location:index.php?include=login&notif=loginUlang");
                            } else {
                                // apakah ada baris baru di table user di database
                                if(mysqli_affected_rows($koneksi) > 0) {
                                    header("Location:index.php?include=profil&notif=editBerhasil");
                                } else {
                                    header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=usernameSudahAda");
                                }
                            }
                        }
                    } else {
                        // password tidak diganti
                        $password = $passwordLama;

                        // query update data user gambar lama dan password lama
                        $sql = "UPDATE `users`
                        SET `nama` = '$nama', `jenis_kelamin` = '$jenis_kelamin', `alamat` = '$alamat', 
                            `no_telp` = '$no_telp', `username` = '$username', `password` = '$password', 
                            `foto` = '$fotoLama' 
                        WHERE `id_user` = '$id_user'";

                        // eksekusi sql
                        mysqli_query($koneksi, $sql);

                        // apakah ada baris baru di table user di database
                        if(mysqli_affected_rows($koneksi) > 0) {
                            header("Location:index.php?include=profil&notif=editBerhasil");
                        } else {
                            header("Location:index.php?include=edit-profil&data=" . $id_user . "&notif=usernameSudahAda");
                        }
                    }
                }
            }
        }
    }
?>