<?php 

    if(isset($_GET["aksi"]) && isset($_GET["data"])) {
        if($_GET["aksi"] == "hapus") {
            $kode_peminjaman = $_GET["data"];

            // hapus data detail peminjaman
            $sql_delete = "DELETE FROM `detail_peminjaman` 
                            WHERE `kode_peminjaman` = '$kode_peminjaman' AND `status` = 'Pinjam'";

            mysqli_query($koneksi, $sql_delete);

            if(mysqli_affected_rows($koneksi) > 0) {
                $sql_delete2 = "DELETE FROM `peminjaman` WHERE `kode_peminjaman` = '$kode_peminjaman'";
                
                mysqli_query($koneksi, $sql_delete2);
            }
        }
    }
    
    // mereset data di halaman
    unset($_SESSION['katakunci_peminjaman']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_peminjaman = $_POST["katakunci"];
        $_SESSION['katakunci_peminjaman'] = $katakunci_peminjaman;
    }
    
    if (isset($_SESSION['katakunci_peminjaman'])) {
        $katakunci_peminjaman = $_SESSION['katakunci_peminjaman'];
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Transaksi Peminjaman</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Peminjaman Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=tambah-peminjaman" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Peminjaman Buku</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=peminjaman" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm bg-light border-1 small" placeholder="Search for..." name="katakunci" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "peminjamanBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Transaksi Peminjaman Buku Berhasil ditambahkan
                            </div>
                        <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Data Berhasil Dihapus
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <th class="text-dark" width="5%" style="text-align: center;">No</th>
                            <th class="text-dark" width="10%">Kode Peminjaman</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Pinjam</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Kembali</th>
                            <th class="text-dark" width="5%" style="text-align: center;">Jumlah</th>
                            <th class="text-dark" width="20%" style="text-align: center;">Peminjam</th>
                            <th class="text-dark" width="5%" style="text-align: center;">Status</th>
                            <th class="text-dark" width="25%" style="text-align: center;">Aksi</th>
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

                                $sql = "SELECT  `peminjaman`.`kode_peminjaman`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`tgl_kembali`, 
                                                `peminjaman`.`jumlah_buku`,  
                                                `detail_peminjaman`.`status`, 
                                                `users`.`nama` 
                                        FROM `peminjaman` 
                                        INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                        INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                                        WHERE `detail_peminjaman`.`status` = 'Pinjam'";

                                // jika kata kunci tidak kosong
                                if (!empty($katakunci_peminjaman)) {
                                    $sql .= " AND `users`.`nama` LIKE '%$katakunci_peminjaman%'";
                                }    

                                $sql .= " GROUP BY `peminjaman`.`kode_peminjaman` ORDER BY `peminjaman`.`kode_peminjaman` LIMIT $posisi, $batas";
                                
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
                            ?>
                            <tr>
                                <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                <td class="align-middle text-dark"><?= $kode_peminjaman; ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_pinjam)); ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_kembali)); ?></td>
                                <td class="align-middle text-dark text-center"><?= $jumlah_buku; ?></td>
                                <td class="align-middle text-dark text-center"><?= $peminjaman; ?></td>
                                <td class="align-middle text-dark text-center"><span class="badge rounded-pill text-white bg-warning"><?= $status; ?></span></td>
                                <td class="align-middle text-center">
                                    <a href="index.php?include=proses-pengembalian&data=<?= $kode_peminjaman; ?>" class="badge badge-success"><i class="fas fa-fw fa fa-undo"></i> Kembali</a> |
                                    <a href="index.php?include=detail-peminjaman&data=<?= $kode_peminjaman; ?>" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i> Detail</a> |
                                    <a href="javascript:if(confirm('Anda yakin ingin menghapus data Peminjaman Buku dengan Kode Peminjaman <?= $kode_peminjaman; ?>?'))window.location.href = 'index.php?include=peminjaman&aksi=hapus&data=<?= $kode_peminjaman; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php
                        // hitung jumlah semua data buku
                        $sql_jum = "SELECT  `peminjaman`.`kode_peminjaman`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`tgl_kembali`, 
                                            `peminjaman`.`jumlah_buku`,  
                                            `detail_peminjaman`.`status`, 
                                            `users`.`nama` 
                                    FROM `peminjaman` 
                                    INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                    INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                                    WHERE `detail_peminjaman`.`status` = 'Pinjam'";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_peminjaman)) {
                            $sql_jum .= " AND `users`.`nama` LIKE '%$katakunci_peminjaman%'";
                        }  
                        
                        $sql_jum .= " GROUP BY `peminjaman`.`kode_peminjaman` ORDER BY `peminjaman`.`kode_peminjaman`";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman&halaman=$jum_halaman'>Last</a></li>";
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
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "peminjamanBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Transaksi Peminjaman Buku Berhasil ditambahkan!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Transaksi Peminjaman Buku Berhasil dihapus!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>