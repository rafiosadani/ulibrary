<?php 

    function kodePeminjamanOtomatis($koneksi) {
        $sql = "SELECT MAX(`peminjaman`.`kode_peminjaman`) as `kodePeminjaman` 
                FROM `peminjaman` 
                INNER JOIN `detail_peminjaman` ON `peminjaman`.`kode_peminjaman` = `detail_peminjaman`.`kode_peminjaman` 
                WHERE `detail_peminjaman`.`status` = 'Pinjam'";

        $query = mysqli_query($koneksi, $sql);

        $data = mysqli_fetch_assoc($query);

        $kodePeminjaman = $data["kodePeminjaman"];

        $tanggal = substr($kodePeminjaman, 4, 8);

        if($tanggal === date('Ymd')) {
            $urutan = (int) substr($kodePeminjaman, 12, 4);

            $urutan++;

            $huruf = "PJBK" . date('Ymd');

            $kodePeminjaman = $huruf . sprintf("%04s", $urutan);
        } else {
            $kodePeminjaman = "PJBK" . date('Ymd') . "0001";
        }

        return $kodePeminjaman;
    }

    function fill_unit_select_box($koneksi) {
        $output = '';

        $query = "SELECT `id_buku`,`judul` FROM `buku` ORDER BY `judul`";

        $result = mysqli_query($koneksi, $query);

        foreach ($result as $rslt) {
            $output .= '<option value="'. $rslt["id_buku"] .'">'. $rslt["judul"] . '</option>';
        }

        return $output;
    }

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Tambah Transaksi Peminjaman Buku</h1>

    <div class="row">
        <div class="col-md-12">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Peminjaman Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=peminjaman" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "peminjamKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Peminjam tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "tglKembaliKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Tanggal Kembali tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "judulKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Judul Buku tidak boleh kosong! Pilih Buku terlebih dahulu
                            </div>
                        <?php elseif ($_GET['notif'] == "jumlahBukuKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Jumlah Buku tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-tambah-peminjaman" method="post" id="tambah_peminjaman">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-5">
                                                <label for="kode_peminjaman" class="col-form-label text-dark">Kode Peminjaman</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" id="kode_peminjaman" class="form-control text-dark" name="kode_peminjaman" value="<?= kodePeminjamanOtomatis($koneksi); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3 g-3 align-items-center">
                                            <div class="col-md-5">
                                                <label for="id_peminjam" class="col-form-label text-dark">Peminjam</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-control selectpicker" name="id_peminjam" id="id_peminjam" data-live-search="true">
                                                    <option value="0">-- Pilih Peminjam --</option>
                                                    <?php

                                                        $sql = "SELECT `id_user`,`nama` 
                                                                FROM `users`
                                                                WHERE `id_role` = 2 
                                                                ORDER BY `nama`";

                                                        $query = mysqli_query($koneksi, $sql);

                                                    ?>

                                                    <?php while ($data = mysqli_fetch_assoc($query)) :
                                                        $id_user = $data["id_user"];
                                                        $nama = $data["nama"];
                                                    ?>
                                                        <option value="<?= $id_user; ?>"><?= $nama; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-5">
                                                <label for="tgl_pinjam" class="col-form-label text-dark">Tanggal Pinjam</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" autocomplete="off" value="<?= date('Y-m-d'); ?>" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <label for="datepicker-date2" class="col-form-label text-dark">Tanggal Kembali</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tgl_kembali" id="datepicker-date2" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-2 border-primary">
                                            <div class="card-header py-2">
                                                <h6 class="m-0 font-weight-bold text-dark card-title text-center">Peminjaman Buku</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered" id="item_table">
                                                            <tr>
                                                                <th class="text-center align-middle text-dark" width="75%">Judul Buku</th>
                                                                <th class="text-center align-middle text-dark" width="15%">Jumlah Buku</th>
                                                                <th class="text-center align-middle" width="10%">
                                                                    <button type="button" name="add" class="btn btn-success btn-sm add"><i class="fas fa-plus"></i></button>
                                                                </th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="index.php?include=tambah-peminjaman&notif=peminjamanBatal" class="btn btn-danger btn-block"><i class="fas fa-fw fa-times"></i> Batalkan</a>
                                <button type="submit" class="btn btn-primary btn-block" name="submit" id="btn-simpan"><i class="fas fa-fw fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "peminjamKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Peminjam tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "tglKembaliKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Tanggal Kembali tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "judulKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Judul Buku tidak boleh kosong! Pilih Buku terlebih dahulu!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "jumlahBukuKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Jumlah Buku tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "peminjamanBatal") : ?>
        <script>
            Swal.fire({
                    icon: 'error',
                    text: 'Transaksi Peminjaman Buku dibatalkan!'
            });
            setInterval(() => {
                window.location.href = 'index.php?include=tambah-peminjaman'
            }, 2000);
        </script>
    <?php endif; ?>
<?php endif; ?>