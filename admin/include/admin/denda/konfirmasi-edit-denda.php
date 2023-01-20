<?php 

    if(isset($_POST["submit"])) {

        $id_denda = $_POST["id_denda"];
        $denda = htmlspecialchars($_POST["denda"]);
        $harga = htmlspecialchars($_POST["harga"]);

        if(empty($denda)) {
            // cek apakah denda sudah di isi atau belum
            header("Location:index.php?include=edit-denda&data=" . $id_denda . "&notif=dendaKosong");
        } else if(empty($harga)) {
            // cek apakah harga denda sudah di isi atau belum
            header("Location:index.php?include=edit-denda&data=" . $id_denda . "&notif=hargaKosong");
        } else if(!is_numeric($harga)) {
            // cek apakah yang diinputkan itu berupa angka
            header("Location:index.php?include=edit-denda&data=" . $id_denda . "&notif=bukanAngka");
        } else {
            // query update denda
            $sql = "UPDATE `denda`
                    SET `denda` = '$denda', `harga` = '$harga' 
                    WHERE `id_denda` = '$id_denda'";

            // update data denda
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=denda&notif=editBerhasil");
        }
        
    }

?>