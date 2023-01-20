<?php 
    session_start();

    include("../koneksi/koneksi.php");
    if (isset($_GET["include"])) {
        $include = $_GET["include"];
        if ($include == "konfirmasi-login") {
            // login
            include("include/auth/konfirmasi-login.php");
        } else if ($include == "konfirmasi-register") {
            // konfirmasi register
            include("include/auth/konfirmasi-register.php");
        } else if ($include == "konfirmasi-edit-profil") {
            // konfirmasi edit profil
            include("include/konfirmasi-edit-profil.php");
        } else if ($include == "konfirmasi-tambah-kategori-buku") {
            // konfirmasi tambah kategori buku
            include("include/admin/kategori-buku/konfirmasi-tambah-kategori-buku.php");
        } else if ($include == "konfirmasi-edit-kategori-buku") {
            // konfirmasi edit kategori buku
            include("include/admin/kategori-buku/konfirmasi-edit-kategori-buku.php");
        } else if ($include == "konfirmasi-tambah-penerbit") {
            // konfirmasi tambah penerbit
            include("include/admin/penerbit/konfirmasi-tambah-penerbit.php");
        } else if ($include == "konfirmasi-edit-penerbit") {
            // konfirmasi edit penerbit
            include("include/admin/penerbit/konfirmasi-edit-penerbit.php");
        } else if ($include == "konfirmasi-tambah-role") {
            // konfirmasi tambah role
            include("include/admin/role/konfirmasi-tambah-role.php");
        } else if ($include == "konfirmasi-edit-role") {
            // konfirmasi edit role
            include("include/admin/role/konfirmasi-edit-role.php");
        } else if ($include == "konfirmasi-tambah-denda") {
            // konfirmasi tambah denda
            include("include/admin/denda/konfirmasi-tambah-denda.php");
        } else if ($include == "konfirmasi-edit-denda") {
            // konfirmasi edit denda
            include("include/admin/denda/konfirmasi-edit-denda.php");
        } else if ($include == "konfirmasi-tambah-rak") {
            // konfirmasi tambah rak
            include("include/admin/rak/konfirmasi-tambah-rak.php");
        } else if ($include == "konfirmasi-edit-rak") {
            // konfirmasi edit rak
            include("include/admin/rak/konfirmasi-edit-rak.php");
        } else if ($include == "konfirmasi-tambah-buku") {
            // konfirmasi tambah buku
            include("include/admin/buku/konfirmasi-tambah-buku.php");
        } else if ($include == "konfirmasi-edit-buku") {
            // konfirmasi edit buku
            include("include/admin/buku/konfirmasi-edit-buku.php");
        } else if ($include == "konfirmasi-tambah-users") {
            // konfirmasi tambah users
            include("include/admin/users/konfirmasi-tambah-users.php");
        } else if ($include == "konfirmasi-edit-users") {
            // konfirmasi edit users
            include("include/admin/users/konfirmasi-edit-users.php");
        } else if ($include == "konfirmasi-ubah-password") {
            // konfirmasi ubah password
            include("include/konfirmasi-ubah-password.php");
        } else if ($include == "konfirmasi-tambah-peminjaman") {
            // konfirmasi tambah transaksi peminjaman
            include("include/admin/peminjaman/konfirmasi-tambah-peminjaman.php");
        } else if ($include == "konfirmasi-tambah-booking-buku") {
            // konfirmasi tambah booking buku
            include("include/user/booking-buku/konfirmasi-tambah-booking-buku.php");
        } else if ($include == "konfirmasi-pengembalian-kembali") {
            // konfirmasi pengembalian kembali
            include("include/admin/pengembalian/konfirmasi-pengembalian-kembali.php");
        } else if ($include == "konfirmasi-pengembalian-buku-rusak") {
            // konfirmasi pengembalian buku rusak
            include("include/admin/pengembalian/konfirmasi-pengembalian-buku-rusak.php");
        } else if ($include == "konfirmasi-pengembalian-buku-hilang") {
            // konfirmasi pengembalian buku hilang
            include("include/admin/pengembalian/konfirmasi-pengembalian-buku-hilang.php");
        } else if ($include == "konfirmasi-tambah-ulasan") {
            // konfirmasi tambah ulasan
            include("include/user/ulasan/konfirmasi-tambah-ulasan.php");
        } else if ($include == "logout") {
            // logout
            include("include/auth/logout.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php if(isset($_SESSION['id_user'])) : ?>
        <?php include('include/templates/head.php'); ?>
    <?php else : ?>
        <?php include('include/templates/auth-head.php'); ?>
    <?php endif; ?>
</head>

<?php if(isset($_GET["include"])) : ?>
    <?php $include = $_GET["include"]; ?>
    <?php if(isset($_SESSION['id_user'])) : ?>
        <body id="page-top">
            <!-- Page Wrapper -->
            <div id="wrapper">

                <?php include('include/templates/sidebar.php') ?>

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <?php include('include/templates/header.php') ?>
                        <!-- Begin Page Content -->
                        <?php
                            if ($include == "dashboard") {
                                // dashboard
                                include("include/admin/dashboard.php");
                            } else if ($include == "edit-profil") {
                                // edit profil
                                include("include/edit-profil.php");
                            } else if ($include == "kategori-buku") {
                                // kategori buku
                                include("include/admin/kategori-buku/kategori-buku.php");
                            } else if ($include == "tambah-kategori-buku") {
                                // tambah kategori buku
                                include("include/admin/kategori-buku/tambah-kategori-buku.php");
                            } else if ($include == "edit-kategori-buku") {
                                // edit kategori buku
                                include("include/admin/kategori-buku/edit-kategori-buku.php");
                            } else if ($include == "penerbit") {
                                // penerbit
                                include("include/admin/penerbit/penerbit.php");
                            } else if ($include == "tambah-penerbit") {
                                // tambah penerbit
                                include("include/admin/penerbit/tambah-penerbit.php");
                            } else if ($include == "edit-penerbit") {
                                // edit penerbit
                                include("include/admin/penerbit/edit-penerbit.php");
                            } else if ($include == "role") {
                                // role
                                include("include/admin/role/role.php");
                            } else if ($include == "tambah-role") {
                                // tambah role
                                include("include/admin/role/tambah-role.php");
                            } else if ($include == "edit-role") {
                                // edit role
                                include("include/admin/role/edit-role.php");
                            } else if ($include == "denda") {
                                // denda
                                include("include/admin/denda/denda.php");
                            } else if ($include == "tambah-denda") {
                                // tambah denda
                                include("include/admin/denda/tambah-denda.php");
                            } else if ($include == "edit-denda") {
                                // edit denda
                                include("include/admin/denda/edit-denda.php");
                            } else if ($include == "rak") {
                                // rak
                                include("include/admin/rak/rak.php");
                            } else if ($include == "tambah-rak") {
                                // tambah rak
                                include("include/admin/rak/tambah-rak.php");
                            } else if ($include == "edit-rak") {
                                // edit rak
                                include("include/admin/rak/edit-rak.php");
                            } else if ($include == "buku") {
                                // buku
                                include("include/admin/buku/buku.php");
                            } else if ($include == "detail-buku") {
                                // detail buku
                                include("include/admin/buku/detail-buku.php");
                            } else if ($include == "tambah-buku") {
                                // tambah buku
                                include("include/admin/buku/tambah-buku.php");
                            } else if ($include == "edit-buku") {
                                // edit buku
                                include("include/admin/buku/edit-buku.php");
                            } else if ($include == "users") {
                                // users
                                include("include/admin/users/users.php");
                            } else if ($include == "detail-users") {
                                // detail users
                                include("include/admin/users/detail-users.php");
                            } else if ($include == "tambah-users") {
                                // tambah users
                                include("include/admin/users/tambah-users.php");
                            } else if ($include == "edit-users") {
                                // edit users
                                include("include/admin/users/edit-users.php");
                            } else if ($include == "ubah-password") {
                                // ubah password
                                include("include/ubah-password.php");
                            } else if ($include == "peminjaman") {
                                // transaksi peminjaman
                                include("include/admin/peminjaman/peminjaman.php");
                            } else if ($include == "tambah-peminjaman") {
                                // tambah transaksi peminjaman
                                include("include/admin/peminjaman/tambah-peminjaman.php");
                            } else if ($include == "detail-peminjaman") {
                                // detail transaksi peminjaman
                                include("include/admin/peminjaman/detail-peminjaman.php");
                            } else if ($include == "pengembalian") {
                                // transaksi pengembalian
                                include("include/admin/pengembalian/pengembalian.php");
                            } else if ($include == "detail-pengembalian") {
                                // detail transaksi pengembalian
                                include("include/admin/pengembalian/detail-pengembalian.php");
                            } else if ($include == "tambah-pengembalian") {
                                // tambah transaksi pengembalian
                                include("include/admin/pengembalian/tambah-pengembalian.php");
                            } else if ($include == "proses-pengembalian") {
                                // proses transaksi pengembalian
                                include("include/admin/pengembalian/proses-pengembalian.php");
                            } else if ($include == "booking-buku") {
                                // booking buku
                                include("include/user/booking-buku/booking-buku.php");
                            } else if ($include == "detail-buku-booking") {
                                // detail buku booking
                                include("include/user/booking-buku/detail-buku-booking.php");
                            } else if ($include == "konfirmasi-booking") {
                                // konfirmasi booking
                                include("include/admin/konfirmasi-booking/konfirmasi-booking.php");
                            } else if ($include == "peminjaman-buku-users") {
                                // data peminjaman buku users
                                include("include/user/peminjaman/peminjaman-buku-user.php");
                            } else if ($include == "detail-peminjaman-buku-users") {
                                // detail peminjaman buku users
                                include("include/user/peminjaman/detail-peminjaman-buku-user.php");
                            } else if ($include == "ulasan") {
                                // ulasan
                                include("include/user/ulasan/ulasan.php");
                            } else if ($include == "detail-ulasan") {
                                // ulasan
                                include("include/user/ulasan/detail-ulasan.php");
                            } else if ($include == "tambah-ulasan") {
                                // ulasan
                                include("include/user/ulasan/tambah-ulasan.php");
                            } else if ($include == "detail-konfirmasi-booking") {
                                // detail konfirmasi booking
                                include("include/admin/konfirmasi-booking/detail-konfirmasi-booking.php");
                            } else if ($include == "laporan-data-buku") {
                                // laporan data buku
                                include("include/admin/laporan/laporan-data-buku.php");
                            } else if ($include == "laporan-data-users") {
                                // laporan data users
                                include("include/admin/laporan/laporan-data-users.php");
                            } else if ($include == "laporan-data-booking") {
                                // laporan data users
                                include("include/admin/laporan/laporan-data-booking.php");
                            } else if ($include == "laporan-data-peminjaman") {
                                // laporan data peminjaman
                                include("include/admin/laporan/laporan-data-peminjaman.php");
                            } else if ($include == "laporan-data-pengembalian") {
                                // laporan data pengembalian
                                include("include/admin/laporan/laporan-data-pengembalian.php");
                            } else if ($include == "cetak-kartu-anggota") {
                                // laporan data pengembalian
                                include("include/user/cetak-kartu/cetak-kartu-anggota.php");
                            } else {
                                // profil
                                include("include/profil.php");
                            }  
                        ?>
                        <!-- /.container-fluid -->
            <?php include('include/templates/footer.php') ?>
            <?php include('include/templates/script.php') ?>
        </body>
    <?php elseif($include == "register") : ?>
        <?php include('include/auth/register.php'); ?>

        <?php include('include/templates/auth-footer.php'); ?>
        </body>
    <?php else : ?>
        <?php include('include/auth/login.php'); ?>

        <?php include('include/templates/auth-footer.php'); ?>
        </body>
    <?php endif; ?>
<?php else : ?>
    <?php if(isset($_SESSION['id_user'])) : ?>
        <body id="page-top">
            <!-- Page Wrapper -->
            <div id="wrapper">

                <?php include('include/templates/sidebar.php') ?>

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <?php include('include/templates/header.php') ?>
                        <!-- Begin Page Content -->
                            <?php include("include/profil.php"); ?>
                        <!-- /.container-fluid -->
            <?php include('include/templates/footer.php') ?>
            <?php include('include/templates/script.php') ?>
        </body>
    <?php elseif($include == "register") : ?>
        <?php include('include/auth/register.php'); ?>

        <?php include('include/templates/auth-footer.php'); ?>
        </body>
    <?php else : ?>
        <?php include('include/auth/login.php'); ?>

        <?php include('include/templates/auth-footer.php'); ?>
        </body>
    <?php endif; ?>
<?php endif; ?>
</html>