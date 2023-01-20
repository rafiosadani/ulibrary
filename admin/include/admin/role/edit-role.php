<?php 

    if (isset($_GET['data'])) {
        $id_role = $_GET['data'];
        
        // get data role
        $sql = "SELECT `id_role`, `role`  
                FROM `role`
                WHERE `id_role` = '$id_role'";

        // mengesekusi sql role yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_role = $data["id_role"];
            $role = $data["role"];
        }
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-3 text-gray-800">Edit Role</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- Default Card Example -->
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-dark card-title">Form Tambah Role</h6>
                    <div class="card-tools">
                        <a href="index.php?include=role" class="btn btn-primary btn-sm float-right"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($_GET['notif'])) : ?>
                        <?php if ($_GET['notif'] == "roleKosong") : ?>
                            <div class="alert alert-danger" style="font-size: 14px;">
                                Role tidak boleh kosong!
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card mb-4 shadow border-primary">
                        <div class="card-body">
                            <form action="index.php?include=konfirmasi-edit-role" method="post">
                                <input type="hidden" name="id_role" value="<?= $id_role; ?>">
                                <div class="row mb-3 g-3 align-items-center">
                                    <div class="col-md-2">
                                        <label for="role" class="col-form-label text-dark">Role</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="role" class="form-control text-dark" name="role" value="<?= $role; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right btn-block" name="submit">Edit Role</button>
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
    <?php if ($_GET['notif'] == "roleKosong") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Role tidak boleh kosong!'
            })
        </script>
    <?php endif; ?>
<?php endif; ?>