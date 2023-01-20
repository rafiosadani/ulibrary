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
    <h1 class="h4 mb-3 text-gray-800">Booking Buku</h1>

    <div class="row">
        <div class="col-md-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Detail Buku</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "rakKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Rak tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-search" action="index.php?include=booking-buku" method="post">
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
                            <div class="row">
                                <?php
                                    // batas data per halaman
                                    $batas = 8;
                                    if (!isset($_GET['halaman'])) {
                                        $posisi = 0;
                                        $halaman = 1;
                                    } else {
                                        $halaman = $_GET['halaman'];
                                        $posisi = ($halaman - 1) * $batas;
                                    }

                                    $sql = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`pengarang`, `buku`.`gambar`,
                                                    `kategori_buku`.`kategori_buku`
                                            FROM `buku` 
                                            INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku`";

                                    // jika kata kunci tidak kosong
                                    if (!empty($katakunci_buku)) {
                                        $sql .= " WHERE `buku`.`judul` LIKE '%$katakunci_buku%' OR `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' 
                                                    OR `buku`.`pengarang` LIKE '%$katakunci_buku%'";
                                    }    

                                    $sql .= " ORDER BY `buku`.`judul` LIMIT $posisi, $batas";
                                    
                                    $query = mysqli_query($koneksi, $sql);

                                    $no = $posisi + 1;
                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_buku = $data["id_buku"];
                                    $judul = $data["judul"];
                                    $gambar = $data["gambar"];
                                    // $kategori_buku = $data["kategori_buku"];
                                    $pengarang = $data["pengarang"];
                                ?>
                                <div class="col-md-3 mt-3">
                                    <div class="card shadow m-auto border-primary" style="width: 180px; height: 400px; font-size: 11px;">
                                        <img src="../dist/img/buku/<?= $gambar; ?>" class="card-img-top border-bottom-primary" alt="..." style="height: 230px;">
                                        <div class="card-body pl-2">
                                            <p class="card-text mb-1 text-dark"><?= $judul; ?></p>
                                            <p class="card-text mb-0 text-secondary"><?= $pengarang; ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush p-0 mt-0">
                                            <li class="list-group-item">
                                                <div class="detail">
                                                    <a href="index.php?include=detail-buku-booking&data=<?= $id_buku; ?>" class="badge rounded-pill">
                                                        <span>Detail</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <?php
                                        // hitung jumlah semua data buku
                                        $sql_jum = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`pengarang`, `buku`.`gambar`,
                                                            `kategori_buku`.`kategori_buku`
                                                    FROM `buku` 
                                                    INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku`";

                                        // jika kata kunci tidak kosong
                                        if (!empty($katakunci_buku)) {
                                            $sql_jum .= " WHERE `buku`.`judul` LIKE '%$katakunci_buku%' OR `kategori_buku`.`kategori_buku` LIKE '%$katakunci_buku%' 
                                                            OR `buku`.`pengarang` LIKE '%$katakunci_buku%'";
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
                                                echo "<li class='page-item'><a class='page-link' href='index.php?include=booking-buku&halaman=1'>First</a></li>";
                                                echo "<li class='page-item'><a class='page-link' href='index.php?include=booking-buku&halaman=$sebelum'>&laquo;</a></li>";
                                                }
                                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                                        if ($i != $halaman) { 
                                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=booking-buku&halaman=$i'>$i</a></li>";
                                                        } else {
                                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                                        }
                                                    }
                                                }
                                                if ($halaman != $jum_halaman) {
                                                echo "<li class='page-item'><a class='page-link' href='index.php?include=booking-buku&halaman=$setelah'>»</a></li>";
                                                echo "<li class='page-item'><a class='page-link' href='index.php?include=booking-buku&halaman=$jum_halaman'>Last</a></li>";
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
            </div>
        </div>
    </div>
</div>
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "rakKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Rak tidak boleh kosong!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>