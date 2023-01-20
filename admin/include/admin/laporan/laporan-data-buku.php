<?php 
    
    // mereset data di halaman
    unset($_SESSION['katakunci_buku']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_buku = $_POST["katakunci"];
        $_SESSION['katakunci_buku'] = $katakunci_buku;
    }
    
    if (isset($_SESSION['katakunci_buku'])) {
        $katakunci_buku = $_SESSION['katakunci_buku'];
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Laporan Data Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book"></i> Daftar Buku</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=laporan-data-buku" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." name="katakunci">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                            <thead>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="36%">Judul Buku</th>
                                <th class="text-dark" width="15%">Kategori Buku</th>
                                <th class="text-dark" width="15%">Penerbit</th>
                                <th class="text-dark" width="5%" style="text-align: center;">Jumlah</th>
                                <th class="text-dark" width="10%" style="text-align: center;">Rak</th>
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

                                    $sql = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`jumlah_buku`, 
                                                    `kategori_buku`.`kategori_buku`,
                                                    `penerbit`.`penerbit`, 
                                                    `rak`.`rak` 
                                            FROM `buku` 
                                            INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
                                            INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` 
                                            INNER JOIN `rak` ON `buku`.`id_rak` = `rak`.`id_rak`";

                                    // jika kata kunci tidak kosong
                                    if (!empty($katakunci_buku)) {
                                        $sql .= " WHERE `buku`.`judul` LIKE '%$katakunci_buku%' OR `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' 
                                                    OR `penerbit`.`penerbit` LIKE '%$katakunci_buku%' OR `rak`.`rak` LIKE '%$katakunci_buku%'";
                                    }    

                                    $sql .= " ORDER BY `buku`.`judul` LIMIT $posisi, $batas";
                                    
                                    $query = mysqli_query($koneksi, $sql);

                                    $no = $posisi + 1;
                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_buku = $data["id_buku"];
                                    $judul = $data["judul"];
                                    $kategori_buku = $data["kategori_buku"];
                                    $penerbit = $data["penerbit"];
                                    $jumlah_buku = $data["jumlah_buku"];
                                    $rak = $data["rak"];
                                ?>
                                <tr>
                                    <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                    <td class="align-middle text-dark"><?= $judul; ?></td>
                                    <td class="align-middle text-dark"><?= $kategori_buku; ?></td>
                                    <td class="align-middle text-dark"><?= $penerbit; ?></td>
                                    <td class="align-middle text-dark text-center"><?= $jumlah_buku; ?></td>
                                    <td class="align-middle text-dark text-center"><?= $rak; ?></td>
                                </tr>
                                <?php $no++; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        // hitung jumlah semua data buku
                        $sql_jum = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`jumlah_buku`, 
                                        `kategori_buku`.`kategori_buku`,
                                        `penerbit`.`penerbit`, 
                                        `rak`.`rak` 
                                FROM `buku` 
                                INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
                                INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` 
                                INNER JOIN `rak` ON `buku`.`id_rak` = `rak`.`id_rak`";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_buku)) {
                            $sql_jum .= " WHERE `buku`.`judul` LIKE '%$katakunci_buku%' OR `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' 
                                        OR `penerbit`.`penerbit` LIKE '%$katakunci_buku%' OR `rak`.`rak` LIKE '%$katakunci_buku%'";
                        }
                        
                        $sql_jum .= " ORDER BY `buku`.`judul`";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-buku&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-buku&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-buku&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-buku&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-buku&halaman=$jum_halaman'>Last</a></li>";
                                }          
                            }
                        ?>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>
    </div>
</div>