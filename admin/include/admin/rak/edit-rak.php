<?php 

    if (isset($_GET['data'])) {
        $id_rak = $_GET['data'];
        
        // get data rak
        $sql = "SELECT `id_rak`, `rak`  
                FROM `rak`
                WHERE `id_rak` = '$id_rak'";

        // mengesekusi sql rak yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_rak = $data["id_rak"];
            $rak = $data["rak"];
        }
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Rak</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Edit Rak</h6>
                    <div class="card-tools">
                        <a href="index.php?include=rak" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "rakKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Rak tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-edit-rak" method="post">
                                <input type="hidden" name="id_rak" value="<?= $id_rak; ?>">
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-2">
                                        <label for="rak" class="col-form-label text-dark">Rak</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="rak" class="form-control text-dark" name="rak" value="<?= $rak; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-block" name="submit">Edit</button>
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
    <?php if ($_GET['notif'] == "rakKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Rak tidak boleh kosong!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>