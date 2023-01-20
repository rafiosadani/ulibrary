<?php 
    if (isset($_GET['data'])) {
        $id_buku = $_GET['data'];
        
        // get data buku
        $sql = "SELECT  `buku`.`judul`, `buku`.`pengarang`, `buku`.`jumlah_halaman`, `buku`.`tahun_terbit`, `buku`.`jumlah_buku`, `buku`.`sinopsis`, `buku`.`gambar`,    
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
    <h1 class="h4 mb-3 text-gray-800">Detail Buku</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card shadow border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Detail Buku</h6>
                    <div class="card-tools">
                        <a href="index.php?include=buku" class="btn btn-primary btn-sm float-right"><i class="fas fa-fw fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered shadow">
                                <tr>
                                    <td class="align-middle" width="35%" rowspan="8">
                                        <img src="../dist/img/buku/<?= $gambar; ?>" class="img-fluid shadow" alt="" width="100%">
                                    </td>
                                    <td class="align-middle text-dark judul-buku" colspan="2">
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
                                        <h5 class="mt-2 text-sinopsis text-dark">Sinopsis</h5>
                                        <p class="text-justify text-dark"><?= $sinopsis; ?></p>
                                    </td>
                                </tr>
                            </table>
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