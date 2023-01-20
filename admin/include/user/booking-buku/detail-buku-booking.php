<?php 
    if (isset($_GET['data'])) {
        $id_buku = $_GET['data'];
        
        // get data buku
        $sql = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`pengarang`, `buku`.`jumlah_halaman`, `buku`.`tahun_terbit`, `buku`.`jumlah_buku`, `buku`.`sinopsis`, `buku`.`gambar`,    
                        `kategori_buku`.`kategori_buku`,
                        `penerbit`.`penerbit`, 
                        `rak`.`rak` 
                FROM `buku` 
                INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
                INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` 
                INNER JOIN `rak` ON `buku`.`id_rak` = `rak`.`id_rak` 
                WHERE `buku`.`id_buku` = '$id_buku'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_buku = $data["id_buku"];
            $judul = $data["judul"];
            $kategori_buku = $data["kategori_buku"];
            $pengarang = $data["pengarang"];
            $penerbit = $data["penerbit"];
            $tahun_terbit = $data["tahun_terbit"];
            $jumlah_halaman = $data["jumlah_halaman"];
            $sinopsis = $data["sinopsis"];
            $jumlah_buku = $data["jumlah_buku"];
            $gambar = $data["gambar"];
            $rak = $data["rak"];
        }
    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail Buku Booking</h1>

    <div class="row">
        <div class="col-md-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Buku Booking</h6>
                    <div class="card-tools">
                        <a href="index.php?include=booking-buku" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <table class="table table-bordered shadow" style="font-size: 10px;">
                                <tr>
                                    <td class="align-middle" width="35%" rowspan="8">
                                        <img src="../dist/img/buku/<?= $gambar; ?>" class="img-fluid shadow" alt="">
                                    </td>
                                    <td class="align-middle text-dark judul-buku" colspan="2" style="font-size: 12px;">
                                        <b><?= $judul; ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark" width="17%">Pengarang</td>
                                    <td class="align-middle text-dark" width="48%"><?= $pengarang; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Penerbit</td>
                                    <td class="align-middle text-dark"><?= $penerbit; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Tahun Terbit</td>
                                    <td class="align-middle text-dark"><?= $tahun_terbit; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Kategori Buku</td>
                                    <td class="align-middle text-dark"><?= $kategori_buku; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Jumlah Halaman</td>
                                    <td class="align-middle text-dark"><?= $jumlah_halaman; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Jumlah Buku</td>
                                    <td class="align-middle text-dark"><?= $jumlah_buku; ?></td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-dark">Rak</td>
                                    <td class="align-middle text-dark"><?= $rak; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p class="mt-2 text-sinopsis text-dark" style="font-size: 12px;">Sinopsis</p>
                                        <p class="text-justify text-dark"><?= $sinopsis; ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-2 border-primary" style="font-size: 12px;">
                                <div class="card-header py-2 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-dark card-title">Booking Buku</h6>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?include=konfirmasi-tambah-booking-buku" method="post">
                                        <input type="hidden" name="id_buku" value="<?= $id_buku; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="tgl_pinjam" class="form-label text-dark">Tanggal Pinjam</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm" name="tgl_pinjam" id="tgl_pinjam" autocomplete="off" value="<?= date('Y-m-d'); ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="datepicker-date" class="form-label text-dark">Tanggal Kembali</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm" name="tgl_kembali" id="datepicker-date" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_buku" class="form-label text-dark">Jumlah Buku</label>
                                                    <input type="number" class="form-control form-control-sm" name="jumlah_buku" autocomplete="off">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm float-right" name="submit">Booking Buku</button>
                                            </div>
                                        </div>
                                    </form>
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
    <?php if ($_GET['notif'] == "kodePeminjamanKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Kode Peminjaman tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "tglKembaliKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Tanggal Kembali tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Buku tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahBukuSalah") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Buku tidak boleh kurang dari 0!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>