<?php 
    
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
    <h1 class="h4 mb-3 text-gray-800">Laporan Data Users</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa fa-users"></i> Daftar User</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <form class="navbar-search" action="index.php?include=laporan-data-users" method="post">
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
                                <th class="text-dark" width="36%">Nama</th>
                                <th class="text-dark" width="15%">Jenis Kelamin</th>
                                <th class="text-dark" width="15%">Alamat</th>
                                <th class="text-dark" width="5%" style="text-align: center;">Username</th>
                                <th class="text-dark" width="10%" style="text-align: center;">Role</th>
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
                                    <?php if($role == "Administrator") : ?>
                                        <td class="text-center align-middle"><span class="badge badge-primary"><?= $role; ?></span></td>
                                    <?php elseif($role == "User") : ?>
                                        <td class="text-center align-middle"><span class="badge badge-danger"><?= $role; ?></span></td>
                                    <?php endif; ?>
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
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-users&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-users&halaman=$sebelum'>&laquo;</a></li>";
                                }
                                for ($i = 1; $i <= $jum_halaman; $i++) {
                                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                        if ($i != $halaman) { 
                                            echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-users&halaman=$i'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                        }
                                    }
                                }
                                if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-users&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='index.php?include=laporan-data-users&halaman=$jum_halaman'>Last</a></li>";
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