<?php 
    
    // mereset data di halaman
    unset($_SESSION['katakunci_kode']);

    // mengambil keyword searching
    if (isset($_POST["katakunci_kode"])) {
        $katakunci_kode = $_POST["katakunci_kode"];
        $_SESSION['katakunci_kode'] = $katakunci_kode;
    }
    
    if (isset($_SESSION['katakunci_kode'])) {
        $katakunci_kode = $_SESSION['katakunci_kode'];
    }

    // mereset data di halaman
    unset($_SESSION['katakunci_nama']);

    // mengambil keyword searching
    if (isset($_POST["katakunci_nama"])) {
        $katakunci_nama = $_POST["katakunci_nama"];
        $_SESSION['katakunci_nama'] = $katakunci_nama;
    }
    
    if (isset($_SESSION['katakunci_nama'])) {
        $katakunci_nama = $_SESSION['katakunci_nama'];
    }

    // mereset data di halaman
    unset($_SESSION['tgl1']);
    unset($_SESSION['tgl2']);

    // mengambil keyword searching
    if (isset($_POST["submit"])) {
        $tgl1 = $_POST["tgl1"];
        $tgl2 = $_POST["tgl2"];

        $_SESSION['tgl1'] = $tgl1;
        $_SESSION['tgl2'] = $tgl2;
    }
    
    if (isset($_SESSION['tgl1']) && isset($_SESSION['tgl2'])) {
        $tgl1 = $_SESSION['tgl1'];
        $tgl2 = $_SESSION['tgl2'];
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Laporan Data Pengembalian</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Pengembalian Buku</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <form class="navbar-search" action="index.php?include=laporan-data-pengembalian" method="post">
                                <div class="input-group">
                                    <select class="form-control form-control-sm selectpicker" name="katakunci_kode" id="cari-kode" data-live-search="true">
                                        <option value="0">-- Pilih Kode Peminjaman --</option>
                                        <?php

                                            $sql = "SELECT `detail_peminjaman`.`kode_peminjaman` 
                                                    FROM `peminjaman`
                                                    INNER JOIN `detail_peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman`
                                                    WHERE `detail_peminjaman`.`status` = 'Kembali' 
                                                    GROUP BY `detail_peminjaman`.`kode_peminjaman`  
                                                    ORDER BY `detail_peminjaman`.`kode_peminjaman`";

                                            $query = mysqli_query($koneksi, $sql);

                                        ?>

                                        <?php while ($data = mysqli_fetch_assoc($query)) :
                                            $kode_peminjaman = $data["kode_peminjaman"];
                                        ?>
                                            <option value="<?= $kode_peminjaman; ?>"><?= $kode_peminjaman; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="fas fa-search fa-sm"> Cari</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="navbar-search" action="index.php?include=laporan-data-pengembalian" method="post">
                                <div class="input-group">
                                    <select class="form-control form-control-sm selectpicker" name="katakunci_nama" id="cari-nama" data-live-search="true">
                                        <option value="0">-- Pilih Nama --</option>
                                        <?php

                                            $sql = "SELECT `detail_peminjaman`.`kode_peminjaman`,`users`.`nama` as namaPeminjam
                                                    FROM `peminjaman`
                                                    INNER JOIN `detail_peminjaman` ON `detail_peminjaman`.`kode_peminjaman` = `peminjaman`.`kode_peminjaman` 
                                                    INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                                                    WHERE `detail_peminjaman`.`status` = 'Kembali' 
                                                    GROUP BY `users`.`nama`  
                                                    ORDER BY `detail_peminjaman`.`kode_peminjaman`";

                                            $query = mysqli_query($koneksi, $sql);

                                        ?>

                                        <?php while ($data = mysqli_fetch_assoc($query)) :
                                            $kode_peminjaman = $data["kode_peminjaman"];
                                            $namaPeminjam = $data["namaPeminjam"];
                                        ?>
                                            <option value="<?= $namaPeminjam; ?>"><?= $namaPeminjam; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="fas fa-search fa-sm"> Cari</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="border-primary">
                    <form action="index.php?include=laporan-data-pengembalian" method="post">
                    <div class="row mb-1">
                        <div class="col-md-5">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="datepicker-date2" class="col-form-label form-control-sm text-dark">Dari</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="tgl1" id="datepicker-date2" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="datepicker-date" class="col-form-label form-control-sm text-dark">Sampai</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="tgl2" id="datepicker-date" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search fa-sm"></i> Cari</button>
                        </div>
                    </div>
                    </form>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <th class="text-dark" width="5%" style="text-align: center;">No</th>
                            <th class="text-dark" width="10%">Kode Peminjaman</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Pinjam</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Kembali</th>
                            <th class="text-dark" width="5%" style="text-align: center;">Jumlah</th>
                            <th class="text-dark" width="20%" style="text-align: center;">Peminjam</th>
                            <th class="text-dark" width="10%" style="text-align: center;">Denda</th>
                            <th class="text-dark" width="5%" style="text-align: center;">Status</th>
                        </thead>
                        <tbody>
                            <?php
                                // batas data per halaman
                                $batas = 5;
                                if (!isset($_GET['halaman'])) {
                                    $posisi = 0;
                                    $halaman = 1;
                                } else {
                                    $halaman = $_GET['halaman'];
                                    $posisi = ($halaman - 1) * $batas;
                                }

                                $sql = "SELECT  SUM(`detail_peminjaman`.`total_denda`) as `totalDenda`, `peminjaman`.`kode_peminjaman`, `peminjaman`.`tgl_pinjam`, `detail_peminjaman`.`tgl_kembali`, 
                                                `peminjaman`.`jumlah_buku`,  
                                                `detail_peminjaman`.`status`, 
                                                `users`.`nama` 
                                        FROM `peminjaman` 
                                        INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                        INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                                        WHERE `detail_peminjaman`.`status` = 'Kembali'";

                                // jika kata kunci tidak kosong
                                if (!empty($katakunci_kode)) {
                                    $sql .= " AND `detail_peminjaman`.`kode_peminjaman` LIKE '%$katakunci_kode%'";
                                } else if (!empty($katakunci_nama)) {
                                    $sql .= " AND `users`.`nama` LIKE '%$katakunci_nama%'";
                                } else if (!empty($tgl1) && !empty($tgl2)) {
                                    $sql .= " AND `detail_peminjaman`.`tgl_kembali` BETWEEN '$tgl1' AND '$tgl2'";
                                }  

                                $sql .= " GROUP BY `detail_peminjaman`.`kode_peminjaman` ORDER BY `detail_peminjaman`.`tgl_kembali` LIMIT $posisi, $batas";
                                
                                $query = mysqli_query($koneksi, $sql);

                                $no = $posisi + 1;
                            ?>

                            <?php while ($data = mysqli_fetch_assoc($query)) :
                                $kode_peminjaman = $data["kode_peminjaman"];
                                $tgl_pinjam = $data["tgl_pinjam"];
                                $tgl_kembali = $data["tgl_kembali"];
                                $jumlah_buku = $data["jumlah_buku"];
                                $peminjaman = $data["nama"];
                                $status = $data["status"];
                                $denda = $data["totalDenda"];
                            ?>
                            <tr>
                                <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                <td class="align-middle text-dark"><?= $kode_peminjaman; ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_pinjam)); ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_kembali)); ?></td>
                                <td class="align-middle text-dark text-center"><?= $jumlah_buku; ?></td>
                                <td class="align-middle text-dark text-center"><?= $peminjaman; ?></td>
                                <td class="align-middle text-dark text-center"><?= $denda; ?></td>
                                <td class="align-middle text-dark text-center"><span class="badge rounded-pill text-white bg-success"><?= $status; ?></span></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php
                        // hitung jumlah semua data buku
                        $sql_jum = "SELECT  SUM(`detail_peminjaman`.`total_denda`) as `totalDenda`, `peminjaman`.`kode_peminjaman`, `peminjaman`.`tgl_pinjam`, `detail_peminjaman`.`tgl_kembali`, 
                                            `peminjaman`.`jumlah_buku`,  
                                            `detail_peminjaman`.`status`, 
                                            `users`.`nama` 
                                    FROM `peminjaman` 
                                    INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                    INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                                    WHERE `detail_peminjaman`.`status` = 'Kembali'";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_kode)) {
                            $sql_jum .= " AND `detail_peminjaman`.`kode_peminjaman` LIKE '%$katakunci_kode%'";
                        } else if (!empty($katakunci_nama)) {
                            $sql_jum .= " AND `users`.`nama` LIKE '%$katakunci_nama%'";
                        } else if (!empty($tgl1) && !empty($tgl2)) {
                            $sql_jum .= " AND `detail_peminjaman`.`tgl_kembali` BETWEEN '$tgl1' AND '$tgl2'";
                        } 
                        
                        $sql_jum .= " GROUP BY `peminjaman`.`kode_peminjaman` ORDER BY `detail_peminjaman`.`tgl_kembali`";

                        $query_jum = mysqli_query($koneksi,$sql_jum);
                        $jum_data = mysqli_num_rows($query_jum);
                        $jum_halaman = ceil($jum_data / $batas);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm float-right">
                        <?php 
                            if ($jum_halaman == 0) {
                                // tidak ada halaman
                            } else if ($jum_halaman == 1) {
                                echo "<li class='page-item'><a class='page-link'>1</a></li>";
                            } else {
                                $sebelum = $halaman - 1;
                                $setelah = $halaman + 1;

                                if ($halaman != 1) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-pengembalian&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-pengembalian&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-pengembalian&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-pengembalian&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-pengembalian&halaman=$jum_halaman'>Last</a></li>";
                                }          
                            }
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>