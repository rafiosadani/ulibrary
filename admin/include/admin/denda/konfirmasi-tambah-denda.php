<?php 

    if(isset($_POST["submit"])) {

        $denda = htmlspecialchars($_POST["denda"]);
        $harga = htmlspecialchars($_POST["harga"]);


        if(empty($denda)) {
            // cek apakah denda sudah di isi atau belum
            header("Location:index.php?include=tambah-denda&notif=dendaKosong");
        } else if(empty($harga)) {
            // cek apakah harga denda sudah di isi atau belum
            header("Location:index.php?include=tambah-denda&notif=hargaKosong");
        } else if(!is_numeric($harga)) {
            // cek apakah yang diinputkan itu berupa angka
            header("Location:index.php?include=tambah-denda&notif=bukanAngka");
        } else {
            // query insert denda
            $sql = "INSERT INTO `denda` (`denda`, `harga`) VALUES ('$denda', '$harga')";

            // insert data denda
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=denda&notif=tambahBerhasil");
        }
        
    }

?>