<?php 

    $id_user_peminjam = $_SESSION["id_user"];

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
    <h1 class="h4 mb-3 text-gray-800">Data Peminjaman Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Peminjaman Buku</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=peminjaman-buku-users" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm bg-light border-1 small" placeholder="masukkan status ..." name="katakunci" autocomplete="off">
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
                        <?php if($_GET['notif'] == "bookingBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Booking Buku berhasil dilakukan! Tunggu Administrator mengkonfirmasi booking buku anda.
                            </div>
                        <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Booking Buku berhasil dihapus!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                            <th class="text-dark" width="5%" style="text-align: center;">No</th>
                            <th class="text-dark" width="15%">Kode Peminjaman</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Pinjam</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Tanggal Kembali</th>
                            <th class="text-dark" width="10%" style="text-align: center;">Jumlah Buku</th>
                            <th class="text-dark" width="10%" style="text-align: center;">Status</th>
                            <th class="text-dark" width="15%" style="text-align: center;">Aksi</th>
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
                                                `detail_peminjaman`.`status` 
                                        FROM `peminjaman` 
                                        INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                        WHERE `peminjaman`.`id_user_peminjam` = '$id_user_peminjam'";

                                // jika kata kunci tidak kosong
                                if (!empty($katakunci_peminjaman)) {
                                    $sql .= " AND `detail_peminjaman`.`status` LIKE '%$katakunci_peminjaman%'";
                                }    

                                $sql .= " GROUP BY `detail_peminjaman`.`kode_peminjaman` ORDER BY `detail_peminjaman`.`status` DESC, `peminjaman`.`tgl_kembali` ASC LIMIT $posisi, $batas";
                                
                                $query = mysqli_query($koneksi, $sql);

                                $no = $posisi + 1;
                            ?>

                            <?php while ($data = mysqli_fetch_assoc($query)) :
                                $kode_peminjaman = $data["kode_peminjaman"];
                                $tgl_pinjam = $data["tgl_pinjam"];
                                $tgl_kembali = $data["tgl_kembali"];
                                $jumlah_buku = $data["jumlah_buku"];
                                $status = $data["status"];
                            ?>
                            <tr>
                                <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                <td class="align-middle text-dark"><?= $kode_peminjaman; ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_pinjam)); ?></td>
                                <td class="align-middle text-dark text-center"><?= date('d F Y', strtotime($tgl_kembali)); ?></td>
                                <td class="align-middle text-dark text-center"><?= $jumlah_buku; ?></td>
                                <td class="align-middle text-dark text-center">
                                    <?php if($status == "Booking") : ?>
                                        <span class="badge rounded-pill text-white bg-warning"><?= $status; ?></span>
                                    <?php elseif($status == "Pinjam") : ?>
                                        <span class="badge rounded-pill text-white bg-primary"><?= $status; ?></span>
                                    <?php else : ?>
                                        <span class="badge rounded-pill text-white bg-success"><?= $status; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if($status == "Booking") : ?>
                                        <a href="index.php?include=detail-peminjaman-buku-users&data=<?= $kode_peminjaman; ?>" class="badge badge-info"><i class="fas fa-fw fa-regular fa-eye"></i> Detail</a> |  <a href="javascript:if(confirm('Anda yakin ingin menghapus data Booking Buku dengan Kode Booking <?= $kode_peminjaman; ?>?'))window.location.href = 'index.php?include=peminjaman-buku-users&aksi=hapus&data=<?= $kode_peminjaman; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                                    <?php else : ?>
                                        <a href="index.php?include=detail-peminjaman-buku-users&data=<?= $kode_peminjaman; ?>" class="badge badge-info"><i class="fas fa-fw fa-regular fa-eye"></i> Detail</a>
                                    <?php endif; ?>
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
                                            `detail_peminjaman`.`status` 
                                    FROM `peminjaman` 
                                    INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                                    WHERE `peminjaman`.`id_user_peminjam` = '$id_user_peminjam'";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_peminjaman)) {
                            $sql_jum .= " AND `detail_peminjaman`.`status` LIKE '%$katakunci_peminjaman%'";
                        }  
                        
                        $sql_jum .= " GROUP BY `detail_peminjaman`.`kode_peminjaman` ORDER BY `detail_peminjaman`.`status` DESC, `peminjaman`.`tgl_kembali` ASC";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman-buku-users&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman-buku-users&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman-buku-users&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman-buku-users&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=peminjaman-buku-users&halaman=$jum_halaman'>Last</a></li>";
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
    <?php if ($_GET['notif'] == "bookingBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Booking Buku berhasil dilakukan! Tunggu Administrator mengkonfirmasi booking buku anda.'
            })
        </script>
    <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Booking Buku berhasil hapus!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>