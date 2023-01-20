<?php 

    if(isset($_GET["aksi"]) && isset($_GET["data"])) {
        if($_GET["aksi"] == "hapus") {
            // get data id rak dengan mengambil data di url (get)
            $id_rak = $_GET["data"];

            // hapus data role
            $sql_delete = "DELETE FROM `rak` WHERE `id_rak` = '$id_rak'";
            
            mysqli_query($koneksi, $sql_delete);
        }
    }

    // mereset data di halaman
    unset($_SESSION['katakunci_rak']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_rak = $_POST["katakunci"];
        $_SESSION['katakunci_rak'] = $katakunci_rak;
    }
    
    if (isset($_SESSION['katakunci_rak'])) {
        $katakunci_rak = $_SESSION['katakunci_rak'];
    }

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Rak</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fa fa-fw fa-server"></i> Daftar Rak</h6>
                    <div class="card-tools">
                        <a href="index.php?include=tambah-rak" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Rak</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=rak" method="post">
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
                                <th class="text-dark" width="79%">Rak</th>
                                <th class="text-dark" width="16%" style="text-align: center;">Aksi</th>
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

                                    $sql = "SELECT `id_rak`, `rak` 
                                            FROM `rak`";

                                    // jika kata kunci tidak kosong
                                    if (!empty($katakunci_rak)) {
                                        $sql .= " WHERE `rak` LIKE '%$katakunci_rak%'";
                                    } 

                                    $sql .= " ORDER BY `rak` LIMIT $posisi, $batas";
                                    $query = mysqli_query($koneksi, $sql);

                                    $no = $posisi + 1;
                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_rak = $data["id_rak"];
                                    $rak = $data["rak"];
                                ?>
                                <tr>
                                    <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                    <td class="align-middle text-dark"><?= $rak; ?></td>
                                    <td class="align-middle text-center">
                                        <a href="index.php?include=edit-rak&data=<?= $id_rak; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i><span> Edit</span></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data Rak <?= $rak; ?>?'))window.location.href = 'index.php?include=rak&aksi=hapus&data=<?= $id_rak; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i><span> Hapus</span></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        // hitung jumlah semua data penerbit
                        $sql_jum = "SELECT `id_rak`, `rak` FROM `rak`";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_rak)) {
                            $sql_jum .= " WHERE `rak` LIKE '%$katakunci_rak%'";
                        }
                        
                        $sql_jum .= " ORDER BY `rak`";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=rak&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=rak&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=rak&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=rak&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=rak&halaman=$jum_halaman'>Last</a></li>";
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