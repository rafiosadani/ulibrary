<?php 
    if (isset($_GET['data'])) {
        $id_buku = $_GET['data'];
        
        // get data buku
        $sql = "SELECT  `id_buku`, `judul`, `id_kategori_buku`, `pengarang`, `id_penerbit`, `tahun_terbit`, `jumlah_halaman`, 
                        `sinopsis`, `jumlah_buku`, `gambar`, `id_rak`
                FROM `buku` 
                WHERE `id_buku` = '$id_buku'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_buku = $data["id_buku"];
            $judul = $data["judul"];
            $kategori_buku_id = $data["id_kategori_buku"];
            $pengarang = $data["pengarang"];
            $penerbit_id = $data["id_penerbit"];
            $tahun_terbit = $data["tahun_terbit"];
            $jumlah_halaman = $data["jumlah_halaman"];
            $sinopsis = $data["sinopsis"];
            $jumlah_buku = $data["jumlah_buku"];
            $gambar = $data["gambar"];
            $rak_id = $data["id_rak"];
        }
    }
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=buku" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "judulBukuKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Judul Buku tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "kategoriBukuKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Kategori Buku tidak boleh kosong! Pilih Kategori Buku terlebih dahulu
                            </div>
                        <?php elseif ($_GET['notif'] == "pengarangKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Pengarang tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "penerbitKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Penerbit tidak boleh kosong! Pilih Penerbit terlebih dahulu
                            </div>
                        <?php elseif ($_GET['notif'] == "tahunTerbitKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Tahun Terbit tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "jumlahHalamanKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Jumlah Halaman tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "jumlahHalamanBukanAngka") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Jumlah Halaman harus angka!
                            </div>
                        <?php elseif ($_GET['notif'] == "jumlahBukuKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Jumlah Buku tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "jumlahBukuBukanAngka") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Jumlah Buku harus angka!
                            </div>
                        <?php elseif ($_GET['notif'] == "rakKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Rak tidak boleh kosong! Pilih Rak terlebih dahulu
                            </div>
                        <?php elseif ($_GET['notif'] == "sinopsisKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Sinopsis tidak boleh kosong!
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
                        <div class="col-md-12">
                            <div class="card mb-4 shadow border-primary">
                                <div class="card-body">
                                    <form action="index.php?include=konfirmasi-edit-buku" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_buku" value="<?= $id_buku; ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $gambar; ?>">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="judul_buku" class="form-label text-dark">Judul Buku</label>
                                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" autocomplete="off" value="<?= $judul; ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="kategori_buku" class="form-label text-dark">Kategori Buku</label><br>
                                                            <select class="form-control" name="kategori_buku" id="kategori_buku">
                                                                <option value="0">-- Pilih Kategori Buku --</option>
                                                                <?php

                                                                    $sql = "SELECT `id_kategori_buku`,`kategori_buku` 
                                                                            FROM `kategori_buku` ORDER BY `kategori_buku`";

                                                                    $query = mysqli_query($koneksi, $sql);

                                                                ?>

                                                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                                                    $id_kategori_buku = $data["id_kategori_buku"];
                                                                    $kategori_buku = $data["kategori_buku"];
                                                                ?>
                                                                    <option value="<?= $id_kategori_buku; ?>" <?php if($id_kategori_buku == $kategori_buku_id) { ?> selected <?php } ?>><?= $kategori_buku; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="pengarang" class="form-label text-dark">Pengarang</label>
                                                            <input type="text" class="form-control" id="pengarang" name="pengarang" autocomplete="off" value="<?= $pengarang; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="penerbit" class="form-label text-dark">Penerbit</label><br>
                                                            <select class="form-control" name="penerbit" id="penerbit">
                                                                <option value="0">-- Pilih Penerbit --</option>
                                                                <?php

                                                                    $sql = "SELECT `id_penerbit`,`penerbit` 
                                                                            FROM `penerbit` ORDER BY `penerbit`";

                                                                    $query = mysqli_query($koneksi, $sql);

                                                                ?>

                                                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                                                    $id_penerbit = $data["id_penerbit"];
                                                                    $penerbit = $data["penerbit"];
                                                                ?>
                                                                    <option value="<?= $id_penerbit; ?>" <?php if($id_penerbit == $penerbit_id) { ?> selected <?php } ?>><?= $penerbit; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="datepicker-year" class="form-label text-dark">Tahun Terbit</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="tahun_terbit" id="datepicker-year" autocomplete="off" value="<?= $tahun_terbit; ?>">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="jumlah_halaman" class="form-label text-dark">Jumlah Halaman</label>
                                                    <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" autocomplete="off" value="<?= $jumlah_halaman; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_buku" class="form-label text-dark">Jumlah Buku</label>
                                                    <input type="jumlah_buku" class="form-control" id="jumlah_buku" name="jumlah_buku" autocomplete="off" value="<?= $jumlah_buku; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rak" class="form-label text-dark">Rak</label><br>
                                                    <select class="form-control" name="rak" id="rak">
                                                        <option value="0">-- Pilih Rak --</option>
                                                        <?php

                                                            $sql = "SELECT `id_rak`,`rak` 
                                                                    FROM `rak` ORDER BY `rak`";

                                                            $query = mysqli_query($koneksi, $sql);

                                                        ?>

                                                        <?php while ($data = mysqli_fetch_assoc($query)) :
                                                            $id_rak = $data["id_rak"];
                                                            $rak = $data["rak"];
                                                        ?>
                                                            <option value="<?= $id_rak; ?>" <?php if($id_rak == $rak_id) { ?> selected <?php } ?>><?= $rak; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="sinopsis" class="form-label text-dark">Sinopsis</label>
                                                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="12" style="resize: none;" autocomplete="off"><?= $sinopsis; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card mb-2 border-primary">
                                                    <div class="card-header py-2 d-flex justify-content-between align-items-center">
                                                        <h6 class="m-0 font-weight-bold text-dark card-title">Preview Foto</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8 m-auto">
                                                                <div class="text-center">
                                                                    <img src="../dist/img/buku/<?= $gambar; ?>" class="card-img rounded" id="preview-img">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="custom-file mb-2">
                                                    <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" name="submit"><i class="fas fa-fw fa-save"></i> Simpan</button>
                                    </form>
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
    <?php if ($_GET['notif'] == "judulBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Judul Buku tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "kategoriBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Kategori Buku tidak boleh kosong! Pilih Kategori Buku terlebih dahulu'
            })
        </script>
    <?php elseif ($_GET['notif'] == "pengarangKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Pengarang tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "penerbitKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Penerbit tidak boleh kosong! Pilih Penerbit terlebih dahulu'
            })
        </script>
    <?php elseif ($_GET['notif'] == "tahunTerbitKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Tahun Terbit tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahHalamanKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Halaman tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahHalamanBukanAngka") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Halaman harus angka!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Buku tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahBukuBukanAngka") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Buku harus angka!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "rakKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Rak tidak boleh kosong! Pilih Rak terlebih dahulu'
            })
        </script>
    <?php elseif ($_GET['notif'] == "sinopsisKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Sinopsis tidak boleh kosong!'
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