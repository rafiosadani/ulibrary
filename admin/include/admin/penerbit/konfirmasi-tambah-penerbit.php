<?php 

    if(isset($_POST["submit"])) {

        $penerbit = htmlspecialchars($_POST["penerbit"]);
        $alamat = htmlspecialchars($_POST["alamat"]);


        if(empty($penerbit)) {
            // cek apakah penerbit sudah di isi atau belum
            header("Location:index.php?include=tambah-penerbit&notif=penerbitKosong");
        } else if(empty($alamat)) {
            // cek apakah alamat sudah di isi atau belum
            header("Location:index.php?include=tambah-penerbit&notif=alamatKosong");
        } else {
            // query insert penerbit
            $sql = "INSERT INTO `penerbit` (`penerbit`, `alamat`) VALUES ('$penerbit', '$alamat')";

            // insert data penerbit
            mysqli_query($koneksi, $sql);
            
            header("Location:index.php?include=penerbit&notif=tambahBerhasil");
        }
        
    }

?>