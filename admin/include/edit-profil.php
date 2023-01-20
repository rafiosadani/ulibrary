<?php 
    if (isset($_GET['data'])) {
        $id_user = $_GET['data'];
        
        // get profil user
        $sql = "SELECT `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `password`, `foto` 
                FROM `users`
                WHERE `id_user` = '$id_user'";

        $query = mysqli_query($koneksi, $sql);

        while ($data = mysqli_fetch_assoc($query)) {
            $nama = $data["nama"];
            $jenis_kelamin = $data["jenis_kelamin"];
            $alamat = $data["alamat"];
            $no_telp = $data["no_telp"];
            $username = $data["username"];
            $password = $data["password"];
            $foto = $data["foto"];
        }
    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Profil</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Profil</h6>
                    <div class="card-tools">
                        <a href="index.php?include=profil" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 shadow border-primary">
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
                                        <?php elseif ($_GET['notif'] == "passwordSama") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Password baru tidak boleh sama dengan password lama!
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
                                    <form action="index.php?include=konfirmasi-edit-profil" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                        <input type="hidden" name="passwordLama" value="<?= $password; ?>">
                                        <input type="hidden" name="fotoLama" value="<?= $foto; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jk" class="form-label">Jenis Kelamin</label><br>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="L" <?php if($jenis_kelamin == "L") { ?> selected <?php } ?>>Laki-laki</option>
                                                        <option value="P" <?php if($jenis_kelamin == "P") { ?> selected <?php } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                                                </div>
                                                <div class="mb-0">
                                                    <label for="no_telp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $no_telp; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                    <span class="text-danger" style="font-weight:lighter; font-size:14px">
                                                        *Jangan diisi jika tidak ingin mengubah password
                                                    </span>
                                                </div>
                                                <div class="custom-file mb-5">
                                                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block float-right" name="submit">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="text-center">
                                                <img src="assets/img/profile/<?= $foto; ?>" class="card-img rounded" id="preview-img">
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
    <?php elseif ($_GET['notif'] == "passwordSama") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Password baru tidak boleh sama dengan password lama!'
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