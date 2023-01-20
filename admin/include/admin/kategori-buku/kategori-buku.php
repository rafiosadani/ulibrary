<?php 

    if(isset($_GET["aksi"]) && isset($_GET["data"])) {
        if($_GET["aksi"] == "hapus") {
            $id_kategori_buku = $_GET["data"];

            // get gambar kategori buku
            $sql_dl_gambar = "SELECT `gambar` FROM `kategori_buku` WHERE `id_kategori_buku` = '$id_kategori_buku'";
            $query_gambar = mysqli_query($koneksi, $sql_dl_gambar);
            $jumlah_gambar = mysqli_num_rows($query_gambar);
            if ($jumlah_gambar > 0) {
                while ($data_gambar = mysqli_fetch_assoc($query_gambar)) {
                    $gambar = $data_gambar["gambar"];
                    // menghapus cover buku
                    unlink("../dist/img/kategori-buku/$gambar");
                }
            }

            // hapus data kategori buku
            $sql_delete = "DELETE FROM `kategori_buku` WHERE `id_kategori_buku` = '$id_kategori_buku'";
            mysqli_query($koneksi, $sql_delete);
        }
    }
    // mereset data di halaman
    unset($_SESSION['katakunci_kategori']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_kategori = $_POST["katakunci"];
        $_SESSION['katakunci_kategori'] = $katakunci_kategori;
    }
    
    if (isset($_SESSION['katakunci_kategori'])) {
        $katakunci_kategori = $_SESSION['katakunci_kategori'];
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Kategori Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa fa-list-alt"></i> Daftar Kategori Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=tambah-kategori-buku" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Kategori Buku</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=kategori-buku" method="post">
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
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "tambahBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Data Berhasil Ditambahkan
                            </div>
                        <?php elseif ($_GET['notif'] == "editBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Data Berhasil Diedit
                            </div>
                            <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
                            <div class="alert alert-success" style="font-size: 14px;">
                                Data Berhasil Dihapus
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                            <thead>
                                <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                <th class="text-dark" width="10%" style="text-align: center;">Gambar</th>
                                <th class="text-dark">Kategori Buku</th>
                                <th class="text-dark" width="16%" style="text-align: center;">Aksi</th>
                            </thead>
                            <tbody>
                                <?php 
                                    // batas data per halaman
                                    $batas = 3;
                                    if (!isset($_GET['halaman'])) {
                                        $posisi = 0;
                                        $halaman = 1;
                                    } else {
                                        $halaman = $_GET['halaman'];
                                        $posisi = ($halaman - 1) * $batas;
                                    }

                                    $sql = "SELECT `id_kategori_buku`,`kategori_buku`, `gambar`
                                            FROM `kategori_buku`";

                                    // jika kata kunci tidak kosong
                                    if (!empty($katakunci_kategori)) {
                                        $sql .= " WHERE `kategori_buku` LIKE '%$katakunci_kategori%'";
                                    } 

                                    $sql .= " ORDER BY `kategori_buku` LIMIT $posisi, $batas";
                                    $query = mysqli_query($koneksi, $sql);

                                    $no = $posisi + 1;
                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_kategori_buku = $data["id_kategori_buku"];
                                    $kategori_buku = $data["kategori_buku"];
                                    $gambar = $data["gambar"];
                                ?>
                                <tr>
                                    <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                    <td class="text-center"><img src="../dist/img/kategori-buku/<?= $gambar; ?>" height="70" width="70" class="img-thumbnail"></td>
                                    <td class="align-middle text-dark"><?= $kategori_buku; ?></td>
                                    <td class="align-middle text-center">
                                        <a href="index.php?include=edit-kategori-buku&data=<?= $id_kategori_buku; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Kategori Buku <?= $kategori_buku; ?>?'))window.location.href = 'index.php?include=kategori-buku&aksi=hapus&data=<?= $id_kategori_buku; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        // hitung jumlah semua data kategori buku
                        $sql_jum = "SELECT `id_kategori_buku`, `kategori_buku` FROM `kategori_buku`";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_kategori)) {
                            $sql_jum .= " WHERE `kategori_buku` LIKE '%$katakunci_kategori%'";
                        }
                        
                        $sql_jum .= " ORDER BY `kategori_buku`";
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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-buku&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-buku&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-buku&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-buku&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-buku&halaman=$jum_halaman'>Last</a></li>";
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
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "tambahBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Data Berhasil Ditambahkan!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "editBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Data Berhasil Diedit!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "hapusBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Data Berhasil Dihapus!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>