<?php 
    if (isset($_GET['data'])) {
        $kode_peminjaman = $_GET['data'];
        
        // get data peminjaman
        $sql = "SELECT  `peminjaman`.`kode_peminjaman`, `peminjaman`.`tgl_pinjam`, `peminjaman`.`tgl_kembali`, 
                        `peminjaman`.`jumlah_buku`,  
                        `users`.`nama` as `user_peminjam`, 
                        `peminjaman`.`id_user_petugas` as `id_user_petugas`
                FROM `peminjaman` 
                INNER JOIN `users` ON `peminjaman`.`id_user_peminjam` = `users`.`id_user` 
                WHERE `peminjaman`.`kode_peminjaman` = '$kode_peminjaman'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $kode_peminjaman = $data["kode_peminjaman"];
            $tgl_pinjam = $data["tgl_pinjam"];
            $tgl_kembali = $data["tgl_kembali"];
            $jumlah_buku = $data["jumlah_buku"];
            $user_peminjam = $data["user_peminjam"];
            $id_user_petugas = $data["id_user_petugas"];
        }

    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Detail Transaksi Peminjaman Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Transaksi Peminjaman Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=peminjaman-buku-users" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body" style="font-size: 13px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Kode Peminjaman</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= $kode_peminjaman; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Tanggal Peminjaman</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= date('d F Y', strtotime($tgl_pinjam)); ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Tanggal Kembali</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= date('d F Y', strtotime($tgl_kembali)); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Jumlah Buku</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= $jumlah_buku; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Nama Peminjam</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= $user_peminjam; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">
                                    <label for="kode_peminjaman" class="col-form-label text-dark">Nama Petugas</label>
                                </div>
                                <div class="col-md-8">
                                    <?php if($id_user_petugas != NULL) : ?>
                                    <?php 
                                        // get data petugas
                                        $sql_petugas = "SELECT `users`.`nama` 
                                                FROM `users` 
                                                INNER JOIN `peminjaman` ON `peminjaman`.`id_user_petugas` = `users`.`id_user` 
                                                WHERE `peminjaman`.`id_user_petugas` = $id_user_petugas";

                                        // mengesekusi sql yang sudah dibuat
                                        $query_petugas = mysqli_query($koneksi, $sql_petugas);

                                        // menyimpan dan membaca data dari query yang sudah dijalankan
                                        while ($data_petugas = mysqli_fetch_assoc($query_petugas)) {
                                            $nama_petugas = $data_petugas["nama"];
                                        }
                                    ?>
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-dark" name="kode_peminjaman" value="<?= $nama_petugas; ?>" readonly>
                                    <?php else : ?>
                                    <input type="text" id="kode_peminjaman" class="form-control form-control-sm text-danger" name="kode_peminjaman" value="Belum di Konfirmasi" readonly>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6 class="mt-2 text-dark"><b>Detail Buku</b></h6>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                                <thead>
                                    <th class="text-dark" width="5%" style="text-align: center;">No</th>
                                    <th class="text-dark" width="70%">Judul Buku</th>
                                    <th class="text-dark" width="25%" style="text-align: center;">Jumlah Buku</th>
                                </thead>
                                <tbody>
                                    <?php
                                        // batas data per halaman
                                        $batas = 3;
                                        if (!isset($_GET['halaman'])) {
                                            $posisi = 0;
                                            $halaman = 1;
                                        } else {
                                            $halaman = $_GET['halaman'];
                                            $posisi = ($halaman - 1) * $batas;
                                        }

                                        $sql = "SELECT  `detail_peminjaman`.`id_detail_peminjaman`, `detail_peminjaman`.`jumlah_buku`, 
                                                        `buku`.`judul`
                                                FROM `detail_peminjaman` 
                                                INNER JOIN `buku` ON `detail_peminjaman`.`id_buku` = `buku`.`id_buku`  
                                                WHERE `detail_peminjaman`.`kode_peminjaman` = '$kode_peminjaman'";

                                        $sql .= " ORDER BY `detail_peminjaman`.`kode_peminjaman` LIMIT $posisi, $batas";
                                        
                                        $query = mysqli_query($koneksi, $sql);

                                        $no = $posisi + 1;
                                    ?>

                                    <?php while ($data = mysqli_fetch_assoc($query)) :
                                        $judul = $data["judul"];
                                        $jumlah_buku = $data["jumlah_buku"];
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle text-dark"><?= $no; ?></td>
                                        <td class="align-middle text-dark"><?= $judul; ?></td>
                                        <td class="align-middle text-dark text-center"><?= $jumlah_buku; ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <?php
                                // hitung jumlah semua data buku
                                $sql_jum = "SELECT  `detail_peminjaman`.`id_detail_peminjaman`, `detail_peminjaman`.`jumlah_buku`, 
                                                    `buku`.`judul`
                                            FROM `detail_peminjaman` 
                                            INNER JOIN `buku` ON `detail_peminjaman`.`id_buku` = `buku`.`id_buku`  
                                            WHERE `detail_peminjaman`.`kode_peminjaman` = '$kode_peminjaman'";
                                
                                $sql_jum .= " ORDER BY `detail_peminjaman`.`kode_peminjaman`";

                                $query_jum = mysqli_query($koneksi,$sql_jum);
                                $jum_data = mysqli_num_rows($query_jum);
                                $jum_halaman = ceil($jum_data / $batas);
                            ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm float-right">
                                <?php 
                                    if ($jum_halaman == 0) {
                                        // tidak ada halaman
                                    } else if ($jum_halaman == 1) {
                                        echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                    } else {
                                        $sebelum = $halaman - 1;
                                        $setelah = $halaman + 1;

                                        if ($halaman != 1) {
                                        echo "<li class='page-item'><a class='page-link' href='index.php?include=detail-peminjaman-buku-users&data=" . $kode_peminjaman . "&halaman=1'>First</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='index.php?include=detail-peminjaman-buku-users&data=" . $kode_peminjaman . "&halaman=$sebelum'>&laquo;</a></li>";
                                        }
                                        for ($i = 1; $i <= $jum_halaman; $i++) {
                                            if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                                                if ($i != $halaman) { 
                                                    echo "<li class='page-item'><a class='page-link' href='index.php?include=detail-peminjaman-buku-users&data=" . $kode_peminjaman . "&halaman=$i'>$i</a></li>";
                                                } else {
                                                    echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                                }
                                            }
                                        }
                                        if ($halaman != $jum_halaman) {
                                        echo "<li class='page-item'><a class='page-link' href='index.php?include=detail-peminjaman-buku-users&data=" . $kode_peminjaman . "&halaman=$setelah'>»</a></li>";
                                        echo "<li class='page-item'><a class='page-link' href='index.php?include=detail-peminjaman-buku-users&data=" . $kode_peminjaman . "&halaman=$jum_halaman'>Last</a></li>";
                                        }          
                                    }
                                ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>