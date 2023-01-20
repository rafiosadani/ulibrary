<?php 

    if (isset($_GET['data']) && isset($_GET['data2'])) {
        $id_buku = $_GET['data'];
        $kode_peminjaman = $_GET['data2'];
        
        // get data role
        $sql = "SELECT `id_buku`, `judul`   
                FROM `buku`
                WHERE `id_buku` = '$id_buku'";

        // mengesekusi sql role yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_buku = $data["id_buku"];
            $buku = $data["judul"];
        }
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Ulasan</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Ulasan</h6>
                    <div class="card-tools">
                        <a href="index.php?include=detail-ulasan&data=<?= $kode_peminjaman; ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "ulasanKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Ulasan tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-tambah-ulasan" method="post">
                                <input type="hidden" name="id_buku" value="<?= $id_buku; ?>">
                                <input type="hidden" name="kode_peminjaman" value="<?= $kode_peminjaman; ?>">
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-2">
                                        <label for="buku" class="col-form-label text-dark">Judul Buku</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="buku" class="form-control text-dark" name="buku" value="<?= $buku; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3 g-3">
                                    <div class="col-md-2">
                                        <label for="ulasan" class="col-form-label text-dark">Ulasan</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea id="ulasan" class="form-control text-dark" name="ulasan" rows="5"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-block" name="submit">Simpan</button>
                            </form>
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
    <?php if ($_GET['notif'] == "ulasanKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Ulasan tidak boleh kosong!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>