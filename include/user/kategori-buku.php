<?php 
    if (isset($_GET['data'])) {
        $id_kategori_buku = $_GET['data'];
        
        // get data kategori buku
        $sql = "SELECT `id_kategori_buku`, `kategori_buku`
                FROM `kategori_buku`
                WHERE `id_kategori_buku` = '$id_kategori_buku'";

        // mengesekusi sql yang sudah dibuat
        $query = mysqli_query($koneksi, $sql);

        // menyimpan dan membaca data dari query yang sudah dijalankan
        while ($data = mysqli_fetch_assoc($query)) {
            $id_kategori_buku = $data["id_kategori_buku"];
            $kategori_buku = $data["kategori_buku"];
        }
    }
?>
<section id="kategori-buku">
    <div class="container">
        <h2 class="judul"><?= $kategori_buku; ?></h2>
        <div class="row my-3">
            <div class="col-md-9">
                <div class="row">
                    <?php 
                        $sql = "SELECT `id_buku`, `judul`, `pengarang`, `gambar`
                                FROM `buku` 
                                WHERE `id_kategori_buku` = '$id_kategori_buku'
                                ORDER BY `id_buku`";

                        $query = mysqli_query($koneksi, $sql);

                    ?>

                    <?php while ($data = mysqli_fetch_assoc($query)) :
                        $id_buku = $data["id_buku"];
                        $judul = $data["judul"];
                        $pengarang = $data["pengarang"];
                        $gambar = $data["gambar"];
                    ?>
                    <div class="col-md-4 mt-4 card-buku">
                        <div class="card m-auto" style="width: 240px; height: 500px;">
                            <img src="dist/img/buku/<?= $gambar; ?>" class="card-img-top img-size">
                            <div class="card-body">
                                <h5 class="card-title"><?= $judul; ?></h5>
                                <p class="card-text"><?= $pengarang; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="detail">
                                        <a href="index.php?include=detail-buku&data=<?= $id_buku; ?>" class="badge rounded-pill">
                                            <span>Detail</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group mt-4 shadow">
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
            </div>
        </div>
    </div>
</section>