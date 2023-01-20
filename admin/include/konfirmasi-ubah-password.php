<?php 

    if (isset($_SESSION['id_user'])) {

        $id_user = $_SESSION['id_user'];
        $pass = $_POST['passwordLama'];
        $passwordLama = md5($pass);
        $passwordBaru = $_POST['passwordBaru'];
        $konfirmasiPassword = $_POST['konfirmasiPasswordBaru'];

        if (empty($pass)) {
            header("Location:index.php?include=ubah-password&notif=passLamaKosong");
        } else if (empty($passwordBaru)) {
            header("Location:index.php?include=ubah-password&notif=passBaruKosong");
        } else if (empty($konfirmasiPassword)) {
            header("Location:index.php?include=ubah-password&notif=konfirmasiPassBaruKosong");
        } else {
            // get password
            $sql = "SELECT `password` FROM `users` WHERE `id_user` = '$id_user'";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_assoc($query)) {
                $passwordLamadb = $data["password"];
            }

            if ($passwordLama != $passwordLamadb) {
                header("Location:index.php?include=ubah-password&notif=passwordLamaTidakSama");
            } else {
                if ($_POST['passwordLama'] == $passwordBaru) {
                    header("Location:index.php?include=ubah-password&notif=passwordLamaSamaDenganBaru");
                } else {
                    if ($passwordBaru != $konfirmasiPassword) {
                        header("Location:index.php?include=ubah-password&notif=konfirmasiPasswordTidakSama");
                    } else {
                        // password lolos dan di enkripsi
                        $passwordFix = md5($passwordBaru);

                        // query update password user
                        $sql = "UPDATE `users`
                                SET `password` = '$passwordFix' 
                                WHERE `id_user` = '$id_user'";

                        // eksekusi sql
                        mysqli_query($koneksi, $sql);
                        
                        // menghapus session
                        session_unset();
                        
                        // diarahkan ke halaman login
                        header("Location:index.php?include=login&notif=loginUlang");
                    }
                }
            }
        }

    }

?>