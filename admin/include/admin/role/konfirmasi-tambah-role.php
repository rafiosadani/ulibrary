<?php 

    if(isset($_POST["submit"])) {

        $role = htmlspecialchars($_POST["role"]);


        if(empty($role)) {
            // cek apakah role sudah di isi atau belum (role ada)
            header("Location:index.php?include=tambah-role&notif=roleKosong");
        } else {
            // query insert role
            $sql = "INSERT INTO `role` (`role`) VALUES ('$role')";

            // insert data role
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=role&notif=tambahBerhasil");
        }

    }

?>