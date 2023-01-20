<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Users</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Users</h6>
                    <div class="card-tools">
                        <a href="index.php?include=users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 border-primary">
                                <div class="card-body">
                                <?php if (!empty($_GET['notif'])) : ?>
                                        <?php if ($_GET['notif'] == "namaKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Nama Lengkap tidak boleh kosong!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "jenisKelaminKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Jenis Kelamin tidak boleh kosong! Pilih Jenis Kelamin terlebih dahulu
                                            </div>
                                        <?php elseif ($_GET['notif'] == "alamatKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Alamat tidak boleh kosong!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "noTelpKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                No Telepon tidak boleh kosong!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "noTelpBukanAngka") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                No Telepon harus angka!
                                            </div> 
                                        <?php elseif ($_GET['notif'] == "usernameKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Username tidak boleh kosong!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "usernameSudahAda") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Maaf username sudah digunakan! Gunakan username yang lain.
                                            </div>
                                        <?php elseif ($_GET['notif'] == "passwordKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Password tidak boleh kosong!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "roleKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Role tidak boleh kosong! Pilih Role terlebih dahulu
                                            </div>
                                        <?php elseif ($_GET['notif'] == "gambarKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Pilih gambar terlebih dahulu!
                                            </div>
                                        <?php elseif ($_GET['notif'] == "bukanGambar") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Yang anda pilih bukan gambar
                                            </div>
                                        <?php elseif ($_GET['notif'] == "gambarTerlaluBesar") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Ukuran gambar terlalu besar
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <form action="index.php?include=konfirmasi-tambah-users" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama" name="nama">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jk" class="form-label">Jenis Kelamin</label><br>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                </div>
                                                <div class="mb-5">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select class="form-control selectpicker" name="role" id="role" data-live-search="true">
                                                        <option value="0">-- Pilih Role --</option>
                                                        <?php

                                                            $sql = "SELECT `id_role`,`role` 
                                                                    FROM `role` ORDER BY `role`";

                                                            $query = mysqli_query($koneksi, $sql);

                                                        ?>

                                                        <?php while ($data = mysqli_fetch_assoc($query)) :
                                                            $id_role = $data["id_role"];
                                                            $role = $data["role"];
                                                        ?>
                                                            <option value="<?= $id_role; ?>"><?= $role; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" name="submit"><i class="fas fa-fw fa-plus"></i> Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 border-primary">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="text-center">
                                                <img src="assets/img/preview/preview.png" class="card-img rounded" id="preview-img">
                                            </div>
                                        </div>
                                    </div>
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
    <?php if ($_GET['notif'] == "namaKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Nama Lengkap tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jenisKelaminKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jenis Kelamin tidak boleh kosong! Pilih Jenis Kelamin terlebih dahulu'
            })
        </script>
    <?php elseif ($_GET['notif'] == "alamatKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Alamat tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "noTelpKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'No Telepon tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "noTelpBukanAngka") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'No Telepon harus angka!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "usernameKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Username tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "usernameSudahAda") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf username sudah digunakan! Gunakan username yang lain.'
            })
        </script>
    <?php elseif ($_GET['notif'] == "passwordKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Password tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "roleKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Role tidak boleh kosong! Pilih Role terlebih dahulu'
            })
        </script>
    <?php elseif ($_GET['notif'] == "gambarKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Pilih gambar terlebih dahulu!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "bukanGambar") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Yang anda pilih bukan gambar'
            })
        </script>
    <?php elseif ($_GET['notif'] == "gambarTerlaluBesar") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Ukuran gambar terlalu besar'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>