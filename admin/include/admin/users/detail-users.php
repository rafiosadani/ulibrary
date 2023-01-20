<?php 
    if (isset($_GET['data'])) {
        $id_user = $_GET['data'];
        
        // get data user
        $sql = "SELECT `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `foto`, `role`.`role`  
                FROM `users`
                INNER JOIN  `role` ON `users`.`id_role` = `role`.`id_role` 
                WHERE `id_user` = '$id_user'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $nama = $data["nama"];
            $jenis_kelamin = $data["jenis_kelamin"];
            $alamat = $data["alamat"];
            $no_telp = $data["no_telp"];
            $username = $data["username"];
            $foto = $data["foto"];
            $roleUser = $data["role"];
        }
    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail User</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail User</h6>
                    <div class="card-tools">
                        <a href="index.php?include=users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered shadow">
                                <tr>
                                    <td class="align-middle" width="35%" rowspan="7">
                                        <img src="assets/img/profile/<?= $foto; ?>" class="img-fluid shadow" alt="" width="100%">
                                    </td>
                                    <td class="align-middle text-dark judul-buku" colspan="2">
                                        <b>Biodata User</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark" width="17%">Nama</td>
                                    <td class="align-middle text-dark" width="48%"><?= $nama; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Jenis Kelamin</td>
                                    <?php if($jenis_kelamin == "L") : ?>
                                        <td class="align-middle text-dark">Laki-laki</td>
                                    <?php else : ?>
                                        <td class="align-middle text-dark">Perempuan</td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Alamat</td>
                                    <td class="align-middle text-dark"><?= $alamat; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">No Telepon</td>
                                    <td class="align-middle text-dark"><?= $no_telp; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Username</td>
                                    <td class="align-middle text-dark"><?= $username; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Role</td>
                                    <td class="align-middle text-dark"><?= $roleUser; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>
    </div>
</div>