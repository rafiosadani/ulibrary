<?php 

    function jumlahBuku($koneksi) {
        $sql = "SELECT COUNT(`id_buku`) as `jumlahBuku` FROM `buku`";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahBuku = $data["jumlahBuku"];
        }

        return $jumlahBuku;
    }

    function jumlahTransaksiPeminjaman($koneksi) {
        $sql = "SELECT COUNT(DISTINCT(`detail_peminjaman`.`kode_peminjaman`)) as `jmlPeminjaman`  
                FROM `peminjaman`
                INNER JOIN `detail_peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`status` = 'Pinjam'";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahPeminjaman = $data["jmlPeminjaman"];
        }

        return $jumlahPeminjaman;
    }

    function jumlahTransaksiPengembalian($koneksi) {
        $sql = "SELECT COUNT(DISTINCT(`detail_peminjaman`.`kode_peminjaman`)) as `jmlPengembalian`  
                FROM `peminjaman`
                INNER JOIN `detail_peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`status` = 'Kembali'";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahPengembalian = $data["jmlPengembalian"];
        }

        return $jumlahPengembalian;
    }

    function jumlahBookingBuku($koneksi) {
        $sql = "SELECT COUNT(DISTINCT(`detail_peminjaman`.`kode_peminjaman`)) as `jmlBookingBuku`  
                FROM `peminjaman`
                INNER JOIN `detail_peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`status` = 'Booking'";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahBookingBuku = $data["jmlBookingBuku"];
        }

        return $jumlahBookingBuku;
    }

    function jumlahKategoriBuku($koneksi) {
        $sql = "SELECT COUNT(`id_kategori_buku`) as `jumlahKategoriBuku` FROM `kategori_buku`";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahKategoriBuku = $data["jumlahKategoriBuku"];
        }

        return $jumlahKategoriBuku;
    }

    function jumlahPenerbit($koneksi) {
        $sql = "SELECT COUNT(`id_penerbit`) as `jumlahPenerbit` FROM `penerbit`";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahPenerbit = $data["jumlahPenerbit"];
        }

        return $jumlahPenerbit;
    }

    function jumlahUsers($koneksi) {
        $sql = "SELECT COUNT(`id_user`) as `jumlahUsers` FROM `users` WHERE `id_role` = 2";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $jumlahUsers = $data["jumlahUsers"];
        }

        return $jumlahUsers;
    }


?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transaksi Peminjaman
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= jumlahTransaksiPeminjaman($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-table fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Transaksi Pengembalian
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?= jumlahTransaksiPengembalian($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-undo fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Booking Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= jumlahBookingBuku($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sharp fa-solid fa-barcode fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Users
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?= jumlahUsers($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= jumlahBuku($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kategori Buku
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= jumlahKategoriBuku($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Penerbit
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= jumlahPenerbit($koneksi); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>