<?php 

    if(isset($_POST["submit"])) {

        $rak = htmlspecialchars($_POST["rak"]);


        if(empty($rak)) {
            // cek apakah rak sudah di isi atau belum (rak ada)
            header("Location:index.php?include=tambah-rak&notif=rakKosong");
        } else {
            // query insert rak
            $sql = "INSERT INTO `rak` (`rak`) VALUES ('$rak')";

            // insert data rak
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=rak&notif=tambahBerhasil");
        }

    }

?>