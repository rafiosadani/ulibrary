<?php 

    if(isset($_POST["submit"])) {
        $id_penerbit = $_POST["id_penerbit"];
        $penerbit = htmlspecialchars($_POST["penerbit"]);
        $alamat = htmlspecialchars($_POST["alamat"]);


        if(empty($penerbit)) {
            // cek apakah penerbit sudah di isi atau belum
            header("Location:index.php?include=edit-penerbit&data=" . $id_penerbit . "&notif=penerbitKosong");
        } else if(empty($alamat)) {
            // cek apakah alamat sudah di isi atau belum
            header("Location:index.php?include=edit-penerbit&data=" . $id_penerbit . "&notif=alamatKosong");
        } else {

            // query update penerbit
            $sql = "UPDATE `penerbit`
                    SET `penerbit` = '$penerbit', `alamat` = '$alamat'
                    WHERE `id_penerbit` = '$id_penerbit'";

            // update data penerbit
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=penerbit&notif=editBerhasil");
        }
    }

?>