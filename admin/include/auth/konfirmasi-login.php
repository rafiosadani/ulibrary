<?php
if (isset($_POST['login'])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, MD5($pass));

    //cek username dan password
    $sql = "SELECT `id_user`, `id_role`
            FROM `users` 
            WHERE `username` = '$username' AND `password` = '$password'";

    $query = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);

    if (empty($user)) {             
        header("Location:index.php?include=login&notif=usernameKosong");
    } else if (empty($pass)) {           
        header("Location:index.php?include=login&notif=passwordKosong");
    } else if ($jumlah == 0) {
        header("Location:index.php?include=login&notif=userpassSalah");
    } else {
        //get data
        while ($data = mysqli_fetch_row($query)) {
            $id_user = $data[0]; //1
            $id_role = $data[1]; //speradmin
            $_SESSION['id_user'] = $id_user;
            $_SESSION['id_role'] = $id_role;
            header("Location:index.php?include=profil&notif=berhasilLogin");
        }
    }
}
