<section id="populer">
    <div class="container">
        <h2 class="text-center judul">Populer</h2>
        <div class="row my-3">
            <?php 

                $sql = "SELECT MAX(`detail_peminjaman`.`jumlah_buku`) as `jmlBuku`, `buku`.`id_buku`,
                                `buku`.`judul`, `buku`.`pengarang`, `buku`.`gambar`
                        FROM `buku`
                        INNER JOIN `detail_peminjaman` ON `buku`.`id_buku` = `detail_peminjaman`.`id_buku`
                        GROUP BY `detail_peminjaman`.`id_buku` 
                        ORDER BY `jmlBuku` DESC LIMIT 6";

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
</section>