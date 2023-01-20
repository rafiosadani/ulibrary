<?php 

    if(isset($_POST["submit"])) {
        $id_rak = $_POST["id_rak"];
        $rak = htmlspecialchars($_POST["rak"]);


        if(empty($rak)) {
            // cek apakah rak sudah di isi atau belum (rak ada)
            header("Location:index.php?include=edit-rak&data=" . $id_rak . "&notif=rakKosong");
        } else {

            // query update rak
            $sql = "UPDATE `rak` 
                    SET `rak` = '$rak' 
                    WHERE `id_rak` = '$id_rak'";

            // update data rak
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=rak&notif=editBerhasil");

        }

    }

?>