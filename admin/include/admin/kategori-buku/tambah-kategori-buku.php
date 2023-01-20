<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Kategori Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Kategori Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=kategori-buku" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "kategoriBukuKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Kategori Buku tidak boleh kosong!
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
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="index.php?include=konfirmasi-tambah-kategori-buku" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="kategori_buku" class="form-label">Kategori Buku</label>
                                                    <input type="text" class="form-control" id="kategori_buku" name="kategori_buku">
                                                </div>
                                                <div class="row mb-3 g-3 align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="customFile" class="col-form-label">Gambar</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block float-right" name="submit">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Gambar</h6>
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
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "kategoriBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Kategori Buku tidak boleh kosong!'
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