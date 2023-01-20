<?php

    if (isset($_GET['data'])) {
        $id_penerbit = $_GET['data'];
        
        // get data penerbit
        $sql = "SELECT `id_penerbit`, `penerbit`, `alamat` 
                FROM `penerbit`
                WHERE `id_penerbit` = '$id_penerbit'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_penerbit = $data["id_penerbit"];
            $penerbit = $data["penerbit"];
            $alamat = $data["alamat"];
        }
    }
    
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Penerbit</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Penerbit</h6>
                    <div class="card-tools">
                        <a href="index.php?include=penerbit" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "penerbitKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Penerbit tidak boleh kosong!
                            </div>
                        <?php elseif ($_GET['notif'] == "alamatKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Alamat tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-edit-penerbit" method="post">
                                <input type="hidden" name="id_penerbit" value="<?= $id_penerbit; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="penerbit" class="form-label text-dark">Penerbit</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $penerbit; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label text-dark">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right" name="submit">Edit Penerbit</button>
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
    <?php if ($_GET['notif'] == "penerbitKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Penerbit tidak boleh kosong!'
            })
        </script>
    <?php elseif ($_GET['notif'] == "alamatKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Alamat tidak boleh kosong!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>