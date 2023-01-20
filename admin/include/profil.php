<?php
    $id_user = $_SESSION['id_user'];

    // get profil user
    $sql = "SELECT `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `foto` FROM `users`
            WHERE `id_user` = '$id_user'";
    
    $query = mysqli_query($koneksi, $sql);
    
    while ($data = mysqli_fetch_assoc($query)) {
        $nama = $data["nama"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $alamat = $data["alamat"];
        $no_telp = $data["no_telp"];
        $foto = $data["foto"];
    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">My Profile</h1>

    <div class="row">
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-3 m-auto">
                        <img src="assets/img/profile/<?= $foto; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <fieldset disabled>
                                <div class="row mb-2 g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="nama" class="col-form-label">Nama</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="nama" class="form-control" value="<?= $nama; ?>">
                                    </div>
                                </div>
                                <div class="row mb-2 g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if($jenis_kelamin == "L") : ?>
                                            <input type="text" id="jenis_kelamin" class="form-control" value="Laki-laki">
                                        <?php else : ?>
                                            <input type="text" id="jenis_kelamin" class="form-control" value="Perempuan">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mb-2 g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="no_telp" class="col-form-label">No Telepon</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="no_telp" class="form-control" value="<?= $no_telp; ?>">
                                    </div>
                                </div>
                                <div class="row mb-2 g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="alamat" class="col-form-label">Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="alamat" class="form-control" value="<?= $alamat; ?>">
                                    </div>
                                </div>
                            </fieldset>
                            <a href="index.php?include=edit-profil&data=<?= $id_user; ?>" class="btn btn-primary btn-block"><i class="fas fa-fw fa-edit"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "berhasilLogin") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Anda berhasil login!',
            })
        </script>
    <?php elseif ($_GET['notif'] == "editBerhasil") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Data Berhasil Diedit!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>