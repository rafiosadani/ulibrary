<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Ubah Password</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title"><i class="fas fa-fw fa-solid fa-key"></i> Form Ubah Password</h6>
                </div>
                <div class="card-body">
                    <h6 class="text-primary">
                        <i class="fas fa-fw fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.
                    </h6>
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "passLamaKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Password Lama tidak boleh kosong! Masukkan Password Lama terlebih dahulu.
                            </div>
                        <?php elseif($_GET['notif'] == "passBaruKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Password Baru tidak boleh kosong! Masukkan Password Baru terlebih dahulu.
                            </div>
                        <?php elseif($_GET['notif'] == "konfirmasiPassBaruKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Konfimasi Password Baru tidak boleh kosong! Masukkan Konfirmasi Password Baru terlebih dahulu.
                            </div>
                        <?php elseif($_GET['notif'] == "passwordLamaTidakSama") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Password Lama tidak sama.
                            </div>
                        <?php elseif($_GET['notif'] == "passwordLamaSamaDenganBaru") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Password Lama sama dengan password baru.
                            </div>
                        <?php elseif($_GET['notif'] == "konfirmasiPasswordTidakSama") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Maaf Password Baru tidak sama dengan konfirmasi password.
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-ubah-password" method="post">
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="rak" class="col-form-label text-dark">Password Lama</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="rak" class="form-control text-dark" name="passwordLama">
                                    </div>
                                </div>
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="rak" class="col-form-label text-dark">Password Baru</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="rak" class="form-control text-dark" name="passwordBaru">
                                    </div>
                                </div>
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="rak" class="col-form-label text-dark">Konfirmasi Password Baru</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="rak" class="form-control text-dark" name="konfirmasiPasswordBaru">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-block" name="submit"><i class="fas fa-fw fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "passLamaKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Password Lama tidak boleh kosong! Masukkan Password Lama terlebih dahulu.'
            })
        </script>
    <?php elseif($_GET['notif'] == "passBaruKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Password Baru tidak boleh kosong! Masukkan Password Baru terlebih dahulu.'
            })
        </script>
    <?php elseif($_GET['notif'] == "konfirmasiPassBaruKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Konfimasi Password Baru tidak boleh kosong! Masukkan Konfirmasi Password Baru terlebih dahulu.'
            })
        </script>
    <?php elseif($_GET['notif'] == "passwordLamaTidakSama") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Password Lama tidak sama.'
            })
        </script>
    <?php elseif($_GET['notif'] == "passwordLamaSamaDenganBaru") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Password Lama sama dengan password baru.'
            })
        </script>
    <?php elseif($_GET['notif'] == "konfirmasiPasswordTidakSama") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Maaf Password Baru tidak sama dengan konfirmasi password.'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>