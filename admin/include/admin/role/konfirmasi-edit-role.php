<?php 

    if(isset($_POST["submit"])) {
        $id_role = $_POST["id_role"];
        $role = htmlspecialchars($_POST["role"]);


        if(empty($role)) {
            // cek apakah role sudah di isi atau belum (role ada)
            header("Location:index.php?include=edit-role&data=" . $id_role . "&notif=roleKosong");
        } else {

            // query update role
            $sql = "UPDATE `role` 
                    SET `role` = '$role' 
                    WHERE `id_role` = '$id_role'";

            // update data role
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=role&notif=editBerhasil");

        }

    }

?>