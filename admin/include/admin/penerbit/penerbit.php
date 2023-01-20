<?php 

    if(isset($_GET["aksi"]) && isset($_GET["data"])) {
        if($_GET["aksi"] == "hapus") {
            // get data id penerbit dengan mengambil data di url (get)
            $id_penerbit = $_GET["data"];

            // hapus data penerbit
            $sql_delete = "DELETE FROM `penerbit` WHERE `id_penerbit` = '$id_penerbit'";
            
            mysqli_query($koneksi, $sql_delete);
        }
    }

    // mereset data di halaman
    unset($_SESSION['katakunci_penerbit']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_penerbit = $_POST["katakunci"];
        $_SESSION['katakunci_penerbit'] = $katakunci_penerbit;
    }
    
    if (isset($_SESSION['katakunci_penerbit'])) {
        $katakunci_penerbit = $_SESSION['katakunci_penerbit'];
    }

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Penerbit</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-book-reader"></i> Daftar Penerbit</h6>
                    <div class="card-tools">
                        <a href="index.php?include=tambah-penerbit" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Penerbit</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=penerbit" method="post">
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
                                <th class="text-dark" width="40%">Penerbit</th>
                                <th class="text-dark" width="39%">Alamat</th>
                                <th class="text-dark" width="16%" style="text-align: center;">Aksi</th>
                            </thead>
                            <tbody>
                                <?php 
                                    // batas data per halaman
                                    $batas = 6;
                                    if (!isset($_GET['halaman'])) {
                                        $posisi = 0;
                                        $halaman = 1;
                                    } else {
                                        $halaman = $_GET['halaman'];
                                        $posisi = ($halaman - 1) * $batas;
                                    }

                                    $sql = "SELECT `id_penerbit`, `penerbit`, `alamat` 
                                            FROM `penerbit`";

                                    // jika kata kunci tidak kosong
                                    if (!empty($katakunci_penerbit)) {
                                        $sql .= " WHERE `penerbit` LIKE '%$katakunci_penerbit%' OR `alamat` LIKE '%$katakunci_penerbit%'";
                                    } 

                                    $sql .= " ORDER BY `penerbit` LIMIT $posisi, $batas";
                                    $query = mysqli_query($koneksi, $sql);

                                    $no = $posisi + 1;
                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_penerbit = $data["id_penerbit"];
                                    $penerbit = $data["penerbit"];
                                    $alamat = $data["alamat"];
                                ?>
                                <tr>
                                    <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                    <td class="align-middle text-dark"><?= $penerbit; ?></td>
                                    <td class="align-middle text-dark"><?= $alamat; ?></td>
                                    <td class="align-middle text-center">
                                        <a href="index.php?include=edit-penerbit&data=<?= $id_penerbit; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Penerbit <?= $penerbit; ?>?'))window.location.href = 'index.php?include=penerbit&aksi=hapus&data=<?= $id_penerbit; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        // hitung jumlah semua data penerbit
                        $sql_jum = "SELECT `id_penerbit`, `penerbit`, `alamat` FROM `penerbit`";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_penerbit)) {
                            $sql_jum .= " WHERE `penerbit` LIKE '%$katakunci_penerbit%' OR `alamat` LIKE '%$katakunci_penerbit%'";
                        }
                        
                        $sql_jum .= " ORDER BY `penerbit`";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=$jum_halaman'>Last</a></li>";
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