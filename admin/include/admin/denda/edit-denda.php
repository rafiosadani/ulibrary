<?php

    if (isset($_GET['data'])) {
        $id_denda = $_GET['data'];
        
        // get data denda
        $sql = "SELECT `id_denda`, `denda`, `harga` 
                FROM `denda`
                WHERE `id_denda` = '$id_denda'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_denda = $data["id_denda"];
            $denda = $data["denda"];
            $harga = $data["harga"];
        }
    }
    
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Denda</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Denda</h6>
                    <div class="card-tools">
                        <a href="index.php?include=denda" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "dendaKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Denda tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "hargaKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Harga Denda tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "bukanAngka") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Harga Denda harus angka!
                            </div>
                        <?php endif; ?>
                <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-edit-denda" method="post">
                            <input type="hidden" name="id_denda" value="<?= $id_denda; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="denda" class="form-label text-dark">Denda</label>
                                            <input type="text" class="form-control" id="denda" name="denda" value="<?= $denda; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label text-dark">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right" name="submit">Edit Denda</button>
                                    </div>
                                </div>
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
    <?php if ($_GET['notif'] == "dendaKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Denda tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "hargaKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Harga Denda tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "bukanAngka") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Harga Denda harus angka!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>