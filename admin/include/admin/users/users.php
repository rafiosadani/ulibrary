<?php 

    if(isset($_GET["aksi"]) && isset($_GET["data"])) {
        if($_GET["aksi"] == "hapus") {
            $id_user = $_GET["data"];

            // get foto user
            $sql_dl_foto = "SELECT `foto` FROM `users` WHERE `id_user` = '$id_user'";
            $query_foto = mysqli_query($koneksi, $sql_dl_foto);
            $jumlah_foto = mysqli_num_rows($query_foto);
            if ($jumlah_foto > 0) {
                while ($data_foto = mysqli_fetch_assoc($query_foto)) {
                    $foto = $data_foto["foto"];

                    // cek jika foto default jangan dihapus / delete
                    if($foto != "default.jpg") {
                        // menghapus foto user
                        unlink("assets/img/profile/$foto");
                    }
                }
            }

            // hapus data user
            $sql_delete = "DELETE FROM `users` WHERE `id_user` = '$id_user'";
            mysqli_query($koneksi, $sql_delete);
        }
    }
    
    // mereset data di halaman
    unset($_SESSION['katakunci_user']);

    // mengambil keyword searching
    if (isset($_POST["katakunci"])) {
        $katakunci_user = $_POST["katakunci"];
        $_SESSION['katakunci_user'] = $katakunci_user;
    }
    
    if (isset($_SESSION['katakunci_user'])) {
        $katakunci_user = $_SESSION['katakunci_user'];
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Pengaturan Users</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa fa-users"></i> Daftar User</h6>
                    <div class="card-tools">
                        <a href="index.php?include=tambah-users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-plus"></i> Tambah Users</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=users" method="post">
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
                                <th class="text-dark" width="36%">Nama</th>
                                <th class="text-dark" width="15%">Jenis Kelamin</th>
                                <th class="text-dark" width="15%">Alamat</th>
                                <th class="text-dark" width="5%" style="text-align: center;">Username</th>
                                <th class="text-dark" width="10%" style="text-align: center;">Role</th>
                                <th class="text-dark" width="14%" style="text-align: center;">Aksi</th>
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
                                
                                // query untuk menampilkan data users
                                $sql = "SELECT  `users`.`id_user`, `users`.`nama`, `users`.`jenis_kelamin`, `users`.`alamat`, 
                                                `users`.`username`, `role`.`role` 
                                        FROM `users` 
                                        INNER JOIN `role` ON `users`.`id_role` = `role`.`id_role`";

                                // jika kata kunci tidak kosong
                                if (!empty($katakunci_user)) {
                                    $sql .= " WHERE `users`.`nama` LIKE '%$katakunci_user%' OR `users`.`jenis_kelamin` LIKE '%$katakunci_user%' 
                                                OR `users`.`alamat` LIKE '%$katakunci_user%' OR `role`.`role` LIKE '%$katakunci_user%'";
                                }    

                                $sql .= " ORDER BY `users`.`id_user` LIMIT $posisi, $batas";
                                
                                $query = mysqli_query($koneksi, $sql);

                                $no = $posisi + 1;
                            ?>

                            <?php while ($data = mysqli_fetch_assoc($query)) :
                                $id_user = $data["id_user"];
                                $nama = $data["nama"];
                                $jenis_kelamin = $data["jenis_kelamin"];
                                $alamat = $data["alamat"];
                                $username = $data["username"];
                                $role = $data["role"];
                            ?>
                                <tr>
                                    <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                    <td class="align-middle text-dark"><?= $nama; ?></td>
                                    <?php if($jenis_kelamin == "L") : ?>
                                        <td class="align-middle text-dark">Laki-laki</td>
                                    <?php else : ?>
                                        <td class="align-middle text-dark">Perempuan</td>
                                    <?php endif; ?>
                                    <td class="align-middle text-dark"><?= $alamat; ?></td>
                                    <td class="align-middle text-dark"><?= $username; ?></td>
                                    <td class="align-middle text-dark"><?= $role; ?></td>
                                    <td class="align-middle text-center">
                                    <a href="index.php?include=detail-users&data=<?= $id_user; ?>" class="badge badge-primary"><i class="fas fa-fw fa-regular fa-eye"></i></a> | <a href="index.php?include=edit-users&data=<?= $id_user; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> | <a href="javascript:if(confirm('Anda yakin ingin menghapus data User <?= $nama; ?>?'))window.location.href = 'index.php?include=users&aksi=hapus&data=<?= $id_user; ?>&notif=hapusBerhasil'" class="badge badge-danger"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $no++; ?>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        // hitung jumlah semua data buku
                        $sql_jum = "SELECT  `users`.`id_user`, `users`.`nama`, `users`.`jenis_kelamin`, `users`.`alamat`, 
                                            `users`.`username`, `role`.`role` 
                                    FROM `users` 
                                    INNER JOIN `role` ON `users`.`id_role` = `role`.`id_role`";

                        // jika kata kunci tidak kosong
                        if (!empty($katakunci_buku)) {
                            $sql_jum .= " WHERE `users`.`nama` LIKE '%$katakunci_user%' OR `users`.`jenis_kelamin` LIKE '%$katakunci_user%' 
                                            OR `users`.`alamat` LIKE '%$katakunci_user%' OR `role`.`role` LIKE '%$katakunci_user%'";
                        }
                        
                        $sql_jum .= " ORDER BY `users`.`id_user`";

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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=users&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=users&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=users&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=users&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=users&halaman=$jum_halaman'>Last</a></li>";
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