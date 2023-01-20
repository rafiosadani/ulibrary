<?php
    $id_user = $_SESSION['id_user'];

    // get profil user
    $sql = "SELECT `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `foto` FROM `users`
            WHERE `id_user` = '$id_user'";
    
    $query = mysqli_query($koneksi, $sql);
    
    while ($data = mysqli_fetch_assoc($query)) {
        $nama = $data["nama"];
        $jenis_kelamin = $data["jenis_kelamin"];
        $alamat = $data["alamat"];
        $no_telp = $data["no_telp"];
        $foto = $data["foto"];
    }
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Cetak Kartu Anggota</h1>

    <div class="row">
        <div class="col-md-7">
            <table class="table table-bordered table-striped" style="font-size: 14px;">
                <tr class="bg-primary">
                    <td colspan="3" class="text-center align-middle" style="border: 1px solid blue;">
                        <img src="assets/img/logo/uLibrary-logo.png" class="img-fluid rounded" style="width: 250px; padding: 10px 0;">
                    </td>
                </tr>
                <tr>
                    <td width="20%" class="text-dark align-middle" style="border-left: 1px solid blue;">Nama</td>
                    <td width="50%" class="text-dark align-middle"><?= $nama; ?></td>
                    <td rowspan="4" width="30%" style="border-right: 1px solid blue; border-bottom: 1px solid blue;">
                        <img src="assets/img/profile/<?= $foto; ?>" class="img-fluid rounded">
                    </td>
                </tr>
                <tr>
                    <td class="text-dark align-middle"style="border-left: 1px solid blue;">Jenis Kelamin</td>
                    <?php if($jenis_kelamin == "L") : ?>
                        <td class="text-dark align-middle">Laki-laki</td>
                    <?php else : ?>
                        <td class="text-dark align-middle">Perempuan</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="text-dark align-middle" style="border-left: 1px solid blue;">Alamat</td>
                    <td class="text-dark align-middle"><?= $alamat; ?></td>
                </tr>
                <tr>
                    <td class="text-dark align-middle" style="border-left: 1px solid blue; border-bottom: 1px solid blue;">No Telepon</td>
                    <td class="text-dark align-middle" style="border-bottom: 1px solid blue;"><?= $no_telp; ?></td>
                </tr>
            </table>
            <!-- <a href="index.php?include=cetak-kartu-anggota-pdf" class="btn btn-primary btn-block">Cetak Kartu</a> -->
        </div>
    </div>

</div>