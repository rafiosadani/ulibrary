<?php 
    if (isset($_GET['data'])) {
        $id_kategori_buku = $_GET['data'];
        
        // get data kategori buku
        $sql = "SELECT `id_kategori_buku`, `kategori_buku`, `gambar` 
                FROM `kategori_buku`
                WHERE `id_kategori_buku` = '$id_kategori_buku'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_kategori_buku = $data["id_kategori_buku"];
            $kategori_buku = $data["kategori_buku"];
            $gambar = $data["gambar"];
        }
    }
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Kategori Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Kategori Buku</h6>
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
                                    <form action="index.php?include=konfirmasi-edit-kategori-buku" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_kategori_buku" value="<?= $id_kategori_buku; ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $gambar; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="kategori_buku" class="form-label">Kategori Buku</label>
                                                    <input type="text" class="form-control" id="kategori_buku" name="kategori_buku" value="<?= $kategori_buku; ?>">
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
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Preview Gambar</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="text-center">
                                                <img src="../dist/img/kategori-buku/<?= $gambar; ?>" class="card-img rounded" id="preview-img">
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
    <?php if ($_GET['notif'] == "kategoriBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Kategori Buku tidak boleh kosong!'
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