<?php 

    if(isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $pass = $_POST["password"];
        $konfirmasiPassword = $_POST["konfirmasiPassword"];

        if (empty($nama)) {             
            header("Location:index.php?include=register&notif=namaKosong");
        } else if (empty($username)) {           
            header("Location:index.php?include=register&notif=usernameKosong");
        } else if (empty($pass)) {           
            header("Location:index.php?include=register&notif=passwordKosong");
        } else if (empty($konfirmasiPassword)) {           
            header("Location:index.php?include=register&notif=konfirmasiPasswordKosong");
        } else if ($pass != $konfirmasiPassword) {
            header("Location:index.php?include=register&notif=konfirmasiPasswordTidakSama");
        } else {
            $password = md5($konfirmasiPassword);
            $foto = 'default.jpg';
            $id_role = 2;

            // query insert users register
            $sql = "INSERT INTO `users` (`nama`, `username`, `password`, `foto`, `id_role`) 
                    VALUES ('$nama', '$username', '$password', '$foto', '$id_role')";

            // insert data users register
            mysqli_query($koneksi, $sql);

            // apakah ada baris baru di table users di database
            if(mysqli_affected_rows($koneksi) > 0) {
                header("Location:index.php?include=login&notif=registerBerhasil");
            } else {
                header("Location:index.php?include=register&notif=usernameSudahAda");
            }
        }
    }

?>