<?php session_start(); ?>
<?php include("koneksi/koneksi.php"); ?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("include/templates/head.php") ?>
    </head>
    <body>
        <?php include("include/templates/navigasi.php") ?>
        
        <?php

            // pemanggilan konten halaman index
            if (isset($_GET["include"])) {
                
                $include = $_GET["include"];

                if ($include == "tentang") {
                    // tentang
                    include("include/user/tentang.php");
                } else if ($include == "populer") {
                    // populer
                    include("include/user/populer.php");
                } else if ($include == "kategori-buku") {
                    // kategori buku
                    include("include/user/kategori-buku.php");
                } else if ($include == "detail-buku") {
                    // detail buku
                    include("include/user/detail-buku.php");
                } else if ($include == "team") {
                    // team
                    include("include/user/team.php");
                } else {    
                    include("include/user/index.php");
                }
            } else {
                include("include/user/index.php");
            }
        ?>
        
        <?php include("include/templates/footer.php") ?>
        <?php include("include/templates/script.php") ?>
    </body>
</html>