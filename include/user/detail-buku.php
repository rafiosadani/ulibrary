<?php 
    if (isset($_GET['data'])) {
        $id_buku = $_GET['data'];
        
        // get data buku
        $sql = "SELECT  `buku`.`id_buku`, `buku`.`judul`, `buku`.`pengarang`, `buku`.`tahun_terbit`, `buku`.`jumlah_halaman`, 
                        `buku`.`sinopsis`, `buku`.`gambar`, 
                        `kategori_buku`.`kategori_buku`, 
                        `penerbit`.`penerbit`  
                FROM `buku` 
                INNER JOIN `kategori_buku` ON `buku`.`id_kategori_buku` = `kategori_buku`.`id_kategori_buku` 
                INNER JOIN `penerbit` ON `buku`.`id_penerbit` = `penerbit`.`id_penerbit` 
                WHERE `id_buku` = '$id_buku'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_buku = $data["id_buku"];
            $judul = $data["judul"];
            $pengarang = $data["pengarang"];
            $tahun_terbit = $data["tahun_terbit"];
            $jumlah_halaman = $data["jumlah_halaman"];
            $sinopsis = $data["sinopsis"];
            $gambar = $data["gambar"];
            $kategori_buku = $data["kategori_buku"];
            $penerbit = $data["penerbit"];
        }
    }
?>

<section id="detail-buku">
    <div class="container">
        <h2 class="judul">Detail Buku</h2>
        <div class="row my-4">
            <div class="col-md-9">
                <table class="table table-bordered shadow">
                    <tr>
                        <td class="align-middle" width="35%" rowspan="6">
                            <img src="dist/img/buku/<?= $gambar; ?>" class="img-fluid shadow" alt="">
                        </td>
                        <td class="align-middle judul-buku" colspan="2">
                            <?= $judul; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle" width="17%">Pengarang</td>
                        <td class="align-middle" width="48%"><?= $pengarang; ?></td>
                    </tr>
                    <tr>
                        <td class="align-middle">Penerbit</td>
                        <td class="align-middle"><?= $penerbit; ?></td>
                    </tr>
                    <tr>
                        <td class="align-middle">Tahun Terbit</td>
                        <td class="align-middle"><?= $tahun_terbit; ?></td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kategori Buku</td>
                        <td class="align-middle"><?= $kategori_buku; ?></td>
                    </tr>
                    <tr>
                        <td class="align-middle">Halaman</td>
                        <td class="align-middle"><?= $jumlah_halaman; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h4 class="mt-2 text-sinopsis">Sinopsis</h4>
                            <p class="text-sinopsis"><?= $sinopsis; ?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3">
                <div class="list-group mb-5 shadow">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Kategori Buku
                    </a>
                    <?php 

                        $sql = "SELECT `id_kategori_buku`, `kategori_buku`
                                FROM `kategori_buku` 
                                ORDER BY `id_kategori_buku`";

                        $query = mysqli_query($koneksi, $sql);

                    ?>

                    <?php while ($data = mysqli_fetch_assoc($query)) :
                        $id_kategori_buku = $data["id_kategori_buku"];
                        $kategori_buku = $data["kategori_buku"];
                    ?>
                    <a href="index.php?include=kategori-buku&data=<?= $id_kategori_buku; ?>" class="list-group-item list-group-item-action"><?= $kategori_buku; ?></a>
                    <?php endwhile; ?>
                </div>

                <?php if(isset($_SESSION["id_user"]) && isset($_SESSION["id_role"])) : ?>
                    <?php if($_SESSION["id_role"] == 2) : ?>
                        <div class="card mb-2 border-primary" style="font-size: 12px;">
                            <div class="card-header py-2 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark card-title">Booking Buku</h6>
                            </div>
                            <div class="card-body">
                                <form action="admin/index.php?include=konfirmasi-tambah-booking-buku" method="post">
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
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit" style="float: right;">Booking Buku</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="ulasan">
    <div class="container">
        <div class="row">
            <h3>Ulasan</h3>
            <?php 
                    // get data peminjaman
                $sql_jumlah = "SELECT COUNT(`testimoni`.`id_buku`) as `jumlah`    
                        FROM `testimoni` 
                        INNER JOIN `users` ON `testimoni`.`id_user` = `users`.`id_user` 
                        WHERE `testimoni`.`id_buku` = $id_buku";

                    // mengesekusi sql yang sudah dibuat
                $query_jumlah = mysqli_query($koneksi, $sql_jumlah);

                // menyimpan dan membaca data dari query yang sudah dijalankan
                while ($data_jumlah = mysqli_fetch_assoc($query_jumlah)) {
                    $jumlah = $data_jumlah["jumlah"];
                }
            ?>

            <?php if($jumlah > 0) : ?>
                <div class="col-md-9">
                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                                // get data peminjaman
                                $sql = "SELECT  `users`.`nama`, `users`.`foto`, `testimoni`.`tgl_testimoni`, `testimoni`.`isi`   
                                        FROM `testimoni` 
                                        INNER JOIN `users` ON `testimoni`.`id_user` = `users`.`id_user` 
                                        WHERE `testimoni`.`id_buku` = $id_buku";

                                // mengesekusi sql yang sudah dibuat
                                $query = mysqli_query($koneksi, $sql);

                                // menyimpan dan membaca data dari query yang sudah dijalankan
                                while ($data = mysqli_fetch_assoc($query)) {
                                    $nama = $data["nama"];
                                    $foto = $data["foto"];
                                    $tgl_testimoni = $data["tgl_testimoni"];
                                    $isi = $data["isi"];
                            
                            ?>
                            <div class="carousel-item active" data-bs-interval="10000">
                                <div class="card mb-3 p-4">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <table>
                                                <tr>
                                                    <td class="align-top" rowspan="3" width="15%" style="padding-right: 12px;">
                                                        <img src="admin/assets/img/profile/<?= $foto; ?>" class="img-ulasan">
                                                    </td>
                                                    <td class="align-middle nama-ulasan"><?= $nama; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle tanggal-ulasan"><?= date('d F Y', strtotime($tgl_testimoni)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="deskripsi-ulasan">
                                                        <?= $isi; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-9">
                    <div class="row">
                        <h5>Belum ada ulasan.</h5>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>